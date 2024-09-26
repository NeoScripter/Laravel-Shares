<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoProfanity implements ValidationRule
{
    protected $badWords = ['shit', 'fuck', 'asshole', 'fucking', 'motherfucker', 'чмо', 'хуй', 'пизда', 'блядь', 'хуесос', 'пидор', 'мразь', 'отсоси', 'пидарас'];
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        foreach ($this->badWords as $badWord) {
            if (stripos($value, $badWord) !== false) {
                $fail('The ' . $attribute . ' contains inappropriate language.');
                return;
            }
        }
    }
}
