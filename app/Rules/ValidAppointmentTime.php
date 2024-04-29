<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;

class ValidAppointmentTime implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
    {
        // Parse the selected time (e.g., "9:00 AM")
        $parsedTime = Carbon::parse($value)->format('H');

        // Check if the time is within the allowed hours (9, 11, or 14)
        return in_array($parsedTime, [9, 11, 14]);
    }

    public function message()
    {
        return 'Invalid appointment time. Please choose a valid time (9:00 AM, 11:00 AM, or 2:00 PM).';
    }
}
