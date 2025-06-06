<?php

namespace App\Jobs;

use App\Mail\TodayOfferMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\User;

class SendTodayOfferEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $offer;

    public function __construct(User $user, $offer)
    {
        $this->user = $user;
        $this->offer = $offer;
    }

    public function handle()
    {
        Mail::to($this->user->email)->send(new TodayOfferMail($this->offer));
    }
}
