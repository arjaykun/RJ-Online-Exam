<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Student;

class SendStudentPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $student;
    public $default_password;

    public function __construct($student, $default_password)
    {
        $this->student = $student;
        $this->default_password = $default_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.send_student_password')
                    ->with([
                        'student' => $this->student, 
                        'default_password' => $this->default_password
                    ]);
    }
}
