<?php

namespace App;

use App\CardFunctions;

class card_lte_20 extends CardFunctions
{
    private $AvailableCards;
    
    public function __construct() {
        $this->AvailableCards = $this->AvailableCount($this);
    }

    public static function GetAvailableCards() {

        $card = new self;

        return $card->AvailableCards;
    }
}
