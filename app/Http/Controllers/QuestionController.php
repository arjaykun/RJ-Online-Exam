<?php

namespace App\Http\Controllers;

use App\Question;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Events\ActivityDoneEvent;

class QuestionController extends Controller
{

	public function __construct() {
		$this->middleware('auth');
	}

	public function create(Test $test) {

        $this->authorize('create', Question::class);
		$question = new Question();

		return view('question.create', compact('question', 'test'));
	}

    public function store(Test $test) {
    	$data = $this->validatedData();

        $choices = Arr::where($data['choices'], function ($value, $key){
            return $value['choice'] != null;
        });


    	$question = $test->questions()->create($data['question']);
    	$question->choices()->createMany($choices);

        event( new ActivityDoneEvent('add', "added new question in test, <a href='{$test->path()}'>{$test->title}</a>."));

    	return back()->with('question_added', 'You have successfully added new question.');
    }

    public function edit(Test $test, Question $question) {
        $this->authorize('update', $question);
        $question->load('choices');

        return view('question.edit', compact('question', 'test'));
    }

    public function update(Test $test, Question $question) {
        $this->authorize('update', $question);

        $data = $this->validatedData();

        $choices = Arr::where($data['choices'], function ($value, $key){
            return $value['choice'] != null;
        });

        $question->update($data['question']);

        for ($i=0; $i < count($choices); $i++) { 
            $res = $question->choices[$i] ?? null;
            if($res) {
                $question->choices[$i]->update($choices[$i]);
            } else {
                $question->choices()->create($choices[$i]);
            } 
        }

        event( new ActivityDoneEvent('edit', "updated a question in test, <a href='{$test->path()}'>{$test->title}</a>."));


        return back()->with('question_updated', 'You have successfully updated the question.');
    }

    public function destroy(Test $test, Question $question) {
        $this->authorize('delete', $question);

        $question->choices()->delete();
        $question->delete();

        event( new ActivityDoneEvent('delete', "deleted new question in test, <a href='{$test->path()}'>{$test->title}</a>."));

        return back()->with('question_deleted', 'You have successfully deleted the question.');
    }

    private function validatedData() {
        return request()->validate([
            'question.question' => 'required',
            'choices.0.choice' => 'required',
            'choices.1.choice' => 'required',
            'choices.2.choice' => 'nullable',
            'choices.3.choice' => 'nullable',
            'choices.*.correct' => 'nullable',
        ]);
    }


}
