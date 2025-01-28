<?php

namespace App\Listeners;

use App\Events\MailEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class MailListen implements ShouldQueue
{
    use InteractsWithQueue;
    
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(MailEvent $event): void
    {
        //
        $user = $event->user;

        Mail::raw('Hello Kaung I am Kaung', function ($message) use ($user) {
            $message->to('mrkaungminnkhant@gmail.com')->subject('MAILERMAILER');
        });
    }
}
