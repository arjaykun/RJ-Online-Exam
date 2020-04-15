<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'first_name' => 'Ryle Jaylee',
            'last_name' => 'Bernardino',
            'is_superadmin' => 1,
        	'email' => 'rjaybernardino@gmail.com',
            'mobile' => '09369206074',
	        'email_verified_at' => now(),
	        'password' => Hash::make('123456'),
	        'remember_token' => Str::random(10),
        ]);
    }
}
