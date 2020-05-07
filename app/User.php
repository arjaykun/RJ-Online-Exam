<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


     public function getFullNameAttribute($value){
        $mname = !blank($this->middle_name) ? ucwords($this->middle_name[0]) . "." : '';
        return ucwords($this->last_name) . ", " . ucwords($this->first_name) . " " . $mname ; 
    }

     public function getFullName2Attribute($value){
        return ucwords($this->last_name) . ", " . ucwords($this->first_name) . " " . ucwords($this->middle_name); 
    }

    public function student_path() {
        return route('students.show', ['student' => $this->id]);
    }

     public function user_path() {
        return route('users.show', ['user' => $this->id]);
    }


    //scopes
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeStudents($query)
    {
        return $query->where('is_student', 1);
    }

    public function scopeStaffs($query)
    {
        return $query->where('is_admin', 1)->orWhere('is_staff', 1);
    }


    //relationshit
    public function student_profile() {
        return $this->hasOne(StudentProfile::class);
    }

    public function klasses() {
        return $this->hasMany(Klass::class);
    }

    public function tests() {
        return $this->hasManyThrough(Test::class, Klass::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function timer() {
        return $this->hasMany(TestTimer::class);
    }

}
