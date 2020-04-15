<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create(['course' => 'Bachelor of Science in Information Technology', 'course_code' => 'BSIT']);
        Course::create(['course' => 'Bachelor of Science in Computer Science', 'course_code' => 'BSCS']);
        Course::create(['course' => 'Bachelor of Science in Educaton', 'course_code' => 'BSED']);
        Course::create(['course' => 'Bachelor of Science in Tourism', 'course_code' => 'BST']);
        Course::create(	['course' => 'Bachelor of Science in Criminolgy', 'course_code' => 'BSC']);
        Course::create(['course' => 'Bachelor of Science in Eletrical Engineering', 'course_code' => 'ECE']);
        Course::create(	['course' => 'Bachelor of Science in Computer Engineering', 'course_code' => 'COE']);
        Course::create(['course' => 'Bachelor of Science in Hotel and Resturant Management', 'course_code' => 'BSHRM']);
        Course::create(	['course' => 'Bachelor of Science in Accountancy', 'course_code' => 'BSA']);
    }
}
