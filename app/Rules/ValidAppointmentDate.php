<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidAppointmentDate implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the date is not in the past
        $currentDate = now()->toDateString();
        if ($value < $currentDate) {
            return false;
        }

        // Check if the date is not a weekend (Saturday or Sunday)
        $dayOfWeek = date('N', strtotime($value));
        if ($dayOfWeek >= 6) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please select a valid appointment date that is not in the past and not on a weekend.';
    }
}
