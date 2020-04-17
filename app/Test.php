<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $guarded = [];

    protected $dates = [
        'deadline',
    ];

    public function getActiveAttribute($value){
        return $this->deadline->greaterThan(now()); 
    }

    public function path() {
    	return route('tests.show', ['class' => $this->klass->id, 'test' => $this->id]);
    }

     public function delete_path() {
    	return route('tests.destroy', ['class' =>$this->klass->id, 'test' => $this->id]);
    }

    public function klass() {
    	return $this->belongsTo(Klass::class);
    }

    public function questions() {
    	return $this->hasMany(Question::class);
    }

    public function choices() {
        return $this->hasManyThrough(Choice::class, Question::class);
    }

    public function grades() {
        return $this->hasMany(Grade::class);
    }

    public function timers() {
        return $this->hasMany(TestTimer::class);
    }
}
