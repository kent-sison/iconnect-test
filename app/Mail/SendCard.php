<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class SendCard extends Mailable
{
    use Queueable, SerializesModels;

    public $card_details;
    public $card_type;
    public $server_name;
    public $card;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($card_details, $card_type, $card, $server_name)
    {
        $this->card_details = $card_details;
        $this->card_type = $card_type;
        $this->server_name = $server_name;
        $this->card = $card;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('payment.mail_card');
    }
}
