<?php

namespace App\Http\Controllers;

use App\Test;
use App\Klass;


class TestController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Klass $class)
    {
        $test = new Test();
        $this->authorize('create', Test::class);
        return view('test.create', compact('class', 'test'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Klass $class)
    {
        $class->tests()->create($this->validatedData());

        return redirect()->route('classes.show', ['class' => $class->id])
                    ->with('test_added', 'You have successfully added a new test.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Klass $class, Test $test)
    {   
        $this->authorize('view', $test);

        $test->load('questions.choices');
 
        return view('test.show', compact('class', 'test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Klass $class, Test $test)
    {
        $this->authorize('update', $test);

        return view('test.edit', compact('class', 'test'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Klass $class, Test $test)
    {
        $this->authorize('update', $test);
       $test->update($this->validatedData());

       return redirect()->route('tests.show', ['class' => $class->id, 'test' => $test->id])
                    ->with('test_updated', 'You have successfully updated a test.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Klass $class, Test $test)
    {
        $this->authorize('view', $delete);
        $test->delete();
        return redirect()->route('classes.show', ['class' => $class->id])
                    ->with('test_deleted', 'You have successfully deleted a test.');
    }


    public function validatedData() {
        return request()->validate([
            'title' => 'required|regex:/^[A-Za-z0-9-\'#&"?! ]+$/',
        ]);
    }
}
