<?php

namespace App\Http\Controllers;

use App\Question;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
    	
    	$question = $test->questions()->create($data['question']);
    	$question->choices()->createMany($data['choices']);

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
        $question->update($data['question']);

        // $question->choices()->delete();
        // $question->choices()->createMany($data['choices']);

        for ($i=0; $i < 4; $i++) { 
            $question->choices[$i]->update($data['choices'][$i]);
        }

        return back()->with('question_updated', 'You have successfully updated the question.');
    }

    public function destroy(Test $test, Question $question) {
        $this->authorize('delete', $question);

        $question->choices()->delete();
        $question->delete();

        return back()->with('question_deleted', 'You have successfully deleted the question.');
    }

    private function validatedData() {
        return request()->validate([
            'question.question' => 'required',
            'choices.*.choice' => 'required',
            'choices.*.correct' => 'required',
        ]);
    }


}
