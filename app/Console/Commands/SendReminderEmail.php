<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReminderEmail;

class SendReminderEmail extends Command
{
    protected $signature = 'email:send-reminder';
    protected $description = 'Send a reminder email';

    public function handle()
    {
        $details = [
            'body' => 'This is your reminder email!'
        ];

        // Replace with the recipient's email for testing
        $toEmail = 'abc@gmail.com';

        Mail::to($toEmail)->send(new ReminderEmail($details));

        $this->info('Reminder email sent successfully!');
    }
}
