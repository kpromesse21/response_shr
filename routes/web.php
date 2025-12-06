<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Ne pas mettre de catch-all ici - laisser les API routes tranquilles
