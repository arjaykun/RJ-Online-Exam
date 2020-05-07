<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Klass;
use Facades\App\Repositories\KlassRepository;
use App\Events\ActivityDoneEvent;

class KlassController extends Controller
{

    public function __construct() {
        $this->middleware('auth', );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $classes = KlassRepository::all('created_at', 0);
       $classes->loadCount('student_profiles','tests');
        
       return view('klass.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $class = new Klass();
    
        return view('klass.create', compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

       $class = auth()->user()->klasses()->create($this->validatedData());

       event(new ActivityDoneEvent('add', "added new class, <a href='{$class->path()}'>{$class->section} - {$class->subject_full}</a>."));

       return back()->with('class_added', 'You have successfully added a new class. View it <a href="' . $class->path() . '">here</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $class = KlassRepository::get($id);

        $this->authorize('view', $class);
        $class->load('tests');

        return view('klass.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $class = KlassRepository::get($id);

        $this->authorize('update', $class);

        return view('klass.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $class = KlassRepository::get($id);

        $this->authorize('update', $class);

        $class->update($this->validatedData());

        event(new ActivityDoneEvent('edit', "updated class, <a href='{$class->path()}'>{$class->section} - {$class->subject_full}</a>"));

        return back()->with('class_updated', 'You have successfully updated a class. View it <a href="' . $class->path() . '">here</a>.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = KlassRepository::get($id);

        $this->authorize('delete', $class);

        $class_temp ="{$class->section} - {$class->subject_full}";
        //delete cascade
        $class->delete();

        event(new ActivityDoneEvent('delete', "deleted class, {$class_temp}."));

        return redirect()
                ->route('classes.index')
                ->with('class_deleted', 'You have successfully deleted a class.');

    }

    public function validatedData() {
        return request()->validate([
            'section' => 'required|max:10|alpha_dash',
            'subject_code' => 'required|max:20|alpha_dash',
            'subject_description' => 'required',
            'end_date' => 'required|date'
        ]);
    }
}
