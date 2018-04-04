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
					<div class="form-group {{ (App\Subquestion::isBigQuestion($item->id)) ? '' : 'question_item' }} ">
						<label for="inputEmail3" class="control-label">Question {{ $item->id }}</label>
						@if ((App\UserRecord::isTookTheContest(\Auth::user()->id, $contest_id)))
							@php 
								$check = App\Helpers\Question::checkRightAnswer(\Auth::user()->id, $item->id, $contest_id);
								if ($check === 1)
									echo App\Helpers\Message::getNotify(0);
								if ($check === 0)
									echo App\Helpers\Message::getNotify(2);
								if ($check === -1)
									echo App\Helpers\Message::getNotify(1);						
							@endphp
						@endif
						<input type="text" class='question' value="{{ $item->id }}" hidden>
						<textarea class='form-control' type='text' disabled> {{ $item->content }} </textarea>
						<br>
							@if (App\Subquestion::isBigQuestion($item->id))
		                        This question is based on those answers: 
		                        @php
		                            $subquestion = App\Subquestion::getAllSubquestion($item->id);
		                            foreach($subquestion as $val) {
		                                 echo $val->subquestion_id . ' ';
		                            }        
		                         @endphp
		                    @endif
							@if($answers = App\Answer::get_all_answers($item->id))
				                @foreach($answers as $ans)
					                <div class='input-group answers_group' name='answers_group'>
						                    <input class='input-group-addon flat-red right-answer' name = '{{ "right-answer".$item->id }}' type='radio' {{ (App\UserRecord::getAnswer(\Auth::user()->id, $contest_id, $item->id)) ? (((App\UserRecord::getAnswer(\Auth::user()->id, $contest_id, $item->id))->answer_id == $ans->id ) ? 'checked' : '') : '' }} >
						                    <input class="form-control answer" type="text" value="{{ $ans->content }}" disabled>
						                    <input class='form-control answer_id' type='text' value="{{ $ans->id }}" hidden >
					                </div>
				                @endforeach
			            	@endif
					</div>
					<br>
		            <p>-------------------</p>
				@endforeach
				<p>This is the end of the test. Check your answers and submit. Good luck!</p>
				@if (!(App\UserRecord::isTookTheContest(\Auth::user()->id, $contest_id)))
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