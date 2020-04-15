<div class="form-group">
  <label for="desc">Question</label>
 <input type="text" class="form-control form-control @error('question.question') is-invalid @enderror " id="desc" placeholder="Enter Test Question" autocomplete="off" name="question[question]"  value="{{ old('question.question') ??  $question->question }}">
 <div class="text-danger">@error('question.question') The question field is required. @enderror </div>
</div>

<fieldset class="border p-2">
	<h5>Choices</h5>
	<hr>

	{{-- Answer --}}
	<div class="form-group">
	  <label for="desc">Correct Answer</label>
	
	 <input type="text" class="form-control form-control @error('choices.0.choice') is-invalid @enderror " id="desc" placeholder="Enter Correct Answer" autocomplete="off" name="choices[0][choice]"  value="{{ $question->choices[0]->choice ?? old('choices.0.choice') }}">
	 <input type="hidden" name="choices[0][correct]" value="1">

	 	 <div class="text-danger">@error('choices.0.choice') You have not yet answered this question  @enderror </div>
	</div>

	{{-- Choice 1 --}}
	<div class="form-group">
	  <label for="desc">Choice #1</label>
	 	 <input type="text" class="form-control form-control @error('choices.1.choice') is-invalid @enderror " id="desc" placeholder="Enter Choice #1" autocomplete="off" name="choices[1][choice]"  value="{{ $question->choices[1]->choice ?? old('choices.1.choice')  }}">
	 	 <input type="hidden" name="choices[1][correct]" value="0">

	 <div class="text-danger">@error('choices.1.choice') The choice #1 field is required. @enderror </div>
	</div>

	{{-- Choice 2 --}}
	<div class="form-group">
	  <label for="desc">Choice #2</label>
	 <input type="text" class="form-control form-control @error('choices.2.choice') is-invalid @enderror " id="desc" placeholder="Enter Choice #2" autocomplete="off" name="choices[2][choice]"  value="{{ $question->choices[2]->choice ?? old('choices.2.choice')  }}">
	 <input type="hidden" name="choices[2][correct]" value="0">

	 <div class="text-danger">@error('choices.2.choice') The choice #2 field is required. @enderror </div>
	</div>

	{{-- Choice 3 --}}
	<div class="form-group">
	  <label for="desc">Choice #3</label>
	 <input type="text" class="form-control form-control @error('choices.3.choice') is-invalid @enderror " id="desc" placeholder="Enter  Choice #3" autocomplete="off" name="choices[3][choice]"  value="{{ $question->choices[3]->choice ?? old('choices.3.choice')  }}">
	 <input type="hidden" name="choices[3][correct]" value="0">

	 <div class="text-danger">@error('choices.3.choice') The choice #3 field is required. @enderror </div>
	</div>

</fieldset>

