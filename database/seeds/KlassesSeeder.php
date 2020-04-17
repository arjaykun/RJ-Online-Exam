<?php

use Illuminate\Database\Seeder;

class KlassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Klass::insert([
        		[
        			'user_id' => 1,
	        		'section' => 'a49',
	        		'subject_code' => 'etron04a',
	        		'subject_description' => 'Data communication and networking',
	        		'end_date' => now()->addMonths(1),
                    'created_at' => now(),
	        		'updated_at' => now(),
        		],
        		[
        			'user_id' => 1,
	        		'section' => 'a49',
	        		'subject_code' => 'math201',
	        		'subject_description' => 'College Algebra',
	        		'end_date' => now()->addMonths(1),
                    'created_at' => now(),
	        		'updated_at' => now(),
        		],
        		[
        			'user_id' => 1,
	        		'section' => 'a50',
	        		'subject_code' => 'comso02a',
	        		'subject_description' => 'Algorithm',
	        		'end_date' => now()->addMonths(1),
                    'created_at' => now(),
	        		'updated_at' => now(),
        		],
        ]);
    }
}
