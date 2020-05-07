<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\StudentProfile' => 'App\Policies\StudentPolicy',
    ];

  

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('activate-test', function($user, $test) {
            return ($user->id == $test->klass->user_id || $user->is_superadmin) && $test->active == 0 && ($test->questions->count() > 0);
        });

        Gate::define('enroll_student', function($user, $class) {
            return ($user->is_admin || $user->is_staff || $user->is_superadmin) &&
                     $user->id == $class->user_id;
        });

        Gate::define('is_test_activated', function($user, $test) {
            return $user->is_student && $test->active && $test->klass->student_profiles->contains('user_id', $user->id);
        });

        Gate::define('take_test', function($user, $test) {
            return $user->is_student && $test->active && $test->klass->student_profiles->contains('user_id', $user->id) && !$test->grades->contains('user_id', $user->id);
        }); 

        Gate::define('launch_class', function($user, $class) {
            return $user->is_student && $class->end_date->greaterThanOrEqualTo($class->created_at) && $class->student_profiles->contains('user_id', $user->id)
             ? Response::allow()
                : Response::deny('Unauthorized Access! You\'re either not enrolled in this class or the class has already ened.');
        }); 
    }
}
