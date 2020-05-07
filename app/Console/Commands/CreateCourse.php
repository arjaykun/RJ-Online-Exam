<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:course {
            course : example=Information_Technology, add _ (underscore) for space} 
            {code : example=BSIT}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make new course';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $course = 'Bachelors of Science in ' .
                     implode(" ", explode("_", $this->argument('course')));


        \App\Course::create([
            'course_code' => $this->argument('code'),
            'course' => $course,
        ]);
    }
}
