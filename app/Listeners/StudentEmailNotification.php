<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\StudentCreated;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendStudentPassword;

class StudentEmailNotification
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
    public function handle(StudentCreated $event)
    {   
        Mail::to($event->student->email)->send(new SendStudentPassword($event->student, $event->default_password));
    }
}
