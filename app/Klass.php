<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Casts\UpperCase;

class Klass extends Model
{
    protected $guarded = [];

    protected $casts = [
        'section' => UpperCase::class,
        'subject_code' => UpperCase::class,
    ];

    protected $dates = [
        'end_date',
    ];
 
    public function getSubjectDescriptionAttribute($value){
        return ucwords($value);
    }

    public function getTitleAttribute($value){
        return "{$this->section} - {$this->subject_description} ( {$this->subject_code} )";
    }

     public function getSubjectFullAttribute($value){
        return $this->subject_description . " ({$this->subject_code}) "; 
    }
    
    public function path() {
    	return route('classes.show', ['class' => $this->id]);
    }

    public function edit_path() {
    	return route('classes.edit', ['class' => $this->id]);
    }

     public function delete_path() {
    	return route('classes.destroy', ['class' => $this->id]);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function student_profiles() {
        return $this->belongsToMany(StudentProfile::class)
                    ->withTimestamps();            
    }


    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function grades() {
        return $this->hasManyThrough(Grade::class, Test::class);
    }

    // public function students() {
    //     return $this->belongsToMany(Student::class)->withTimestamps();
    // }
}
