<?php

use Illuminate\Console\Command;
use App\Models\User;
use App\Jobs\SendTodayOfferEmailJob;

class SendTodayOfferCommand extends Command
{
    protected $signature = 'offer:send-today';
    protected $description = 'Send Today\'s Offer Email to all users';

    public function handle()
    {
        $offerText = "Get 25% OFF on all products today only!";

        $users = User::all(); // You can add filters here
        foreach ($users as $user) {
            SendTodayOfferEmailJob::dispatch($user, $offerText);
        }

        $this->info('Offer emails have been queued.');
    }
}
