<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function index()
    {
        $activities = \App\Activity::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('admin.activities', ['activities' => $activities]);
    }

    public function destroy() {
    	auth()->user()->activities()->delete();

    	return back();
    }


}
