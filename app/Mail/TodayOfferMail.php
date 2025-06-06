<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TodayOfferMail extends Mailable
{
    use Queueable, SerializesModels;

    public $offer;

    public function __construct($offer)
    {
        $this->offer = $offer;
    }

    public function build()
    {
        return $this->subject('Today\'s Special Offer!')
                    ->view('emails.today_offer');
    }
}
