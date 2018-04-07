@extends('user::main')
@section('content')
<div class="box">
	<br>
	<div class="box-body border-line">
		<div class="form-group">
            <label for="inputEmail3" class="col-sm-7 control-label">Name: {{ \Auth::user()->name }} </label>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-6 control-label">Title: {{ $info->title }}</label>
        </div>


        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Date: {{ ($info->date) ? date('d/m/Y', strtotime($info->date)) : null }}</label>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Subject: {{ App\Subjects::getName($info->subject_id) }} </label>
        </div>

    </div>
    <br>
	<div class="box-body" id='question_field'>
		<form id='form_submit' action='/user/contest/{{ $contest_id }}/submit' method="POST">
			@if ($data)
				<input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
				@if ($lasted)
					<p class="card-text">Result: {{ $lasted }} </p>
				@endif
				@foreach ($data as $item)
					@if ($took)	
						@php
							$check = App\Helpers\Question::checkRightAnswer($item->id, $record, $result);
							if ($check == 1)
								echo App\Helpers\Message::getNotify(0);
							if ($check == 0)
								echo App\Helpers\Message::getNotify(2);
							if ($check == -1)
								echo App\Helpers\Message::getNotify(1);
						@endphp
					@endif
					<div class="form-group {{ (!empty($subquestion) && in_array(['question_id' => $item->id], $subquestion)) ? '' : 'question_item' }} ">
						<label for="inputEmail3" class="control-label">Question {{ $item->id }}</label>
						
						<input type="text" class='question' value="{{ $item->id }}" hidden>
						<textarea class='form-control' type='text' disabled> {{ $item->content }} </textarea>
						<br>
							@if (!empty($subquestion) && in_array(['question_id' => $item->id], $subquestion))
		                        This question is based on those answers: 
		                        @php
		                            $subquestionData = App\Subquestion::getAllSubquestion($item->id);
		                            foreach($subquestionData as $val) {
		                                 echo $val->subquestion_id . ' ';
		                            }        
		                         @endphp
		                    @endif
							@if($answers)
				                @foreach($answers as $ans)
				                	@if ($ans->question_id == $item->id )
						                <div class='input-group answers_group' name='answers_group'>
							                    <input class='input-group-addon flat-red right-answer' name = '{{ "right-answer".$item->id }}' type='radio' {{ App\Helpers\Question::checkBox($item->id, $ans->id, $record) }} >
							                    <input class="form-control answer" type="text" value="{{ $ans->content }}" disabled>
							                    <input class='form-control answer_id' type='text' value="{{ $ans->id }}" hidden >
						                </div>
					                @endif
				                @endforeach
			            	@endif
					</div>
					<br>
		            <p>-------------------</p>
				@endforeach
				<p>This is the end of the test. Check your answers and submit. Good luck!</p>
				@if (!$took)
					<div class="box-footer">
				        <button type="submit" id='submit' class="btn btn-info">Submit</button>
				    </div>
			    @endif
			@endif
		</form>
	</div>
</div>
<br>
@endsection
@section('javascript')
<script src="/user/js/exam.js"></script>
@stop