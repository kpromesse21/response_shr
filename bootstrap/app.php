<?php

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias([
            'auth.api' => \App\Http\Middleware\ApiAuthenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
        // 🔐 Erreur 401 - Non authentifié
    $exceptions->render(function (AuthenticationException $e, $request) {
        return $request->expectsJson()
            ? response()->json(['message' => 'Non authentifié'], 401)
            : redirect()->route('login');
    });

    // 🚫 Erreur 403 - Accès interdit
    $exceptions->render(function (AuthorizationException $e, $request) {
        return response()->json(['message' => 'Accès interdit'], 403);
    });

    // ❌ Erreur 404 - Ressource non trouvée
    $exceptions->render(function (NotFoundHttpException $e, $request) {
        return response()->json(['message' => 'Ressource introuvable'], 404);
    });

    // 🧨 Autres erreurs HTTP
    $exceptions->render(function (HttpExceptionInterface $e, $request) {
        return response()->json([
            'message' => $e->getMessage() ?: 'Erreur serveur',
            'status' => $e->getStatusCode(),
        ], $e->getStatusCode());
    });
    })->create();