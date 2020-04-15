<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\TestActivated;
use Illuminate\Support\Facades\Notification;
use App\Events\TestActivatedEvent;
use App\Notifications\TestActivatedNotification;

class TestActivationNotificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(TestActivatedEvent $event)
    {
        Notification::send($event->students[0]->user_id, new TestActivatedNotification($event->test));
    }
}
