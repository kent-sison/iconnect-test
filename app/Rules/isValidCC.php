<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class isValidCC implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    private $value;

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->value = $value;
        return $this->isValidCC($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->$value . ' is not a valid credit card number.';
    }

    public function isValidCC($cc_number) {
        // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
        $cc_number = preg_replace('/\D/', '', $cc_number);
        // Set the string length and parity
        $number_length = strlen($cc_number);
        $parity = $number_length % 2;
        // Loop through each digit and do the maths
        $total = 0;
        for ($i = 0; $i < $number_length; $i++) {
            $digit = $cc_number[$i];
            // Multiply alternate digits by two
            if ($i % 2 == $parity) {
                $digit *= 2;
                // If the sum is two digits, add them together (in effect)
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            // Total up the digits
            $total += $digit;
        }
        // If the total mod 10 equals 0, the number is valid
        return ($total % 10 == 0) ? true : false;
    }

}
