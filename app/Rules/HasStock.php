<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Card_type;
use App\CardFunctions;

class HasStock implements Rule
{

    private $card_description;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(CardFunctions::InStockCard($value)) {
           return true; 
        }

        $this->card_description = Card_type::where('card_code', $value)->first()->card_desc;
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No Available Stock for ' . $this->card_description;
    }
}
