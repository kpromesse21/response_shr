<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Login implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
        //verifier que le login est au format email
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            $fail('Le champ :attribute doit être une adresse email valide.');
        }
        // verifier que le login n'est pas vide
        if (empty($value)) {
            $fail('Le champ :attribute ne peut pas être vide.');
        }
        // verifier  si le mot de passe est au moins de 8 caracteres
        if (strlen($value) < 8) {
            $fail('Le champ :attribute doit contenir au moins 8 caractères.');
        }
    }
}
