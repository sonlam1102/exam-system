@extends('user::main')
@section('content')
<div class="box">
	<div class="box-body" id='question_field'>
		@if ($data)
			@foreach ($data as $item)
				<div class='form-group question_item'>
					<label for="inputEmail3" class="control-label">Question {{ $item->id }}</label>
					<textarea class='form-control question' type='text' disabled> {{ $item->content }} </textarea>
				</div>
				@if($answers = App\Answer::get_all_answers($item->id))
	                @foreach($answers as $ans)
	                    <div class='input-group answers_group' name='answers_group'>
		                    <input class='input-group-addon flat-red right-answer' name = '{{ "right-answer".$item->id }}' type='radio'>
		                    <input class="form-control answer" type="text" value="{{ $ans->content }}" disabled>
		                    <input class='form-control answer_id' type='text' value="{{ $ans->id }}" hidden >
	                    </div>
	                @endforeach
	            @endif
				<br>
	            <p>-------------------</p>
			@endforeach
			<p>This is the end of the test. Check your answer and submit. Good luck!</p>
			<div class="box-footer">
		        <button type="submit" id='submit' class="btn btn-info">Submit</button>
		    </div>
		@endif
	</div>
</div>
@stop