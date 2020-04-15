<?php 	

namespace App\Repositories;

use App\Klass;

class KlassRepository 
{
	public function all($name, $sortBy = 1) {

		return $sortBy === 1 ? 
							auth()->user()->klasses->sortBy($name):
							auth()->user()->klasses->sortByDesc($name);
	}

	public function get($id) {
		return Klass::findOrFail($id);
	}
}