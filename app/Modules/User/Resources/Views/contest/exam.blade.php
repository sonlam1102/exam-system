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
            <label for="inputEmail3" class="col-sm-2 control-label">Subject: {{ App\Model\Subjects::getName($info->subject_id) }} </label>
        </div>

    </div>
    <br>
	<div class="box-body" id='question_field'>
		<form id='form_submit' action='/user/contest/{{ $contest->id }}/submit' method="POST">
			@if ($questions)
				<input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
				@if ($lasted)
					<p class="card-text">Result: {{ $lasted }} </p>
				@endif
				@foreach ($questions as $item)
					<div class="form-group">
						@if($item->isBigQuestion())
							<label for="inputEmail3" class="control-label">Big Question #{{ $item->id }}</label>
							<input type="text" class='big-question' value="{{ $item->id }}" hidden>
							<textarea class='form-control' type='text' disabled> {{ $item->content }} </textarea>
							<br>
							@if (!empty($subquestion) && in_array(['question_id' => $item->id], $subquestion))
								This question is based on those answers:
								@php
									$subquestionData = $item->subquestions;
                                    foreach($subquestionData as $val) {
                                         echo $val->id . ' ';
                                    }
								@endphp
							@endif
							<br>
							@foreach ($item->subquestions as $sub)
                                @if($took)
                                    @php
                                        $check = App\Helpers\Question::checkRightAnswer($sub->id, $contest->records->where('user_id', '=', \Auth::user()->id), $contest->results);
                                        if ($check == 1)
                                            echo App\Helpers\Message::getNotify(0);
                                        if ($check == 0)
                                            echo App\Helpers\Message::getNotify(2);
                                        if ($check == -1)
                                            echo App\Helpers\Message::getNotify(1);
                                    @endphp
                                @endif
								<div class="question_item">
									<label for="inputEmail3" class="control-label">Question #{{ $sub->id }} (reference from #Question {{ $item->id }})</label>
									<input type="text" class='question' value="{{ $sub->id }}" hidden>
									<textarea class='form-control' type='text' disabled> {{ $sub->content }} </textarea>
									@if($sub->answers)
										@foreach($sub->answers as $ans)
											<div class='input-group answers_group' name='answers_group'>
												<input class='input-group-addon flat-red right-answer' name = '{{ "right-answer".$sub->id }}' type='radio' {{ App\Helpers\Question::checkBox($sub->id, $ans->id, $contest->records->where('user_id', '=', \Auth::user()->id)) }} >
												<input class="form-control answer" type="text" value="{{ $ans->content }}" disabled>
												<input class='form-control answer_id' type='text' value="{{ $ans->id }}" hidden >
											</div>
										@endforeach
									@endif
								</div>

							@endforeach
							<p>-------------------</p>

						@elseif(!$item->isSubQuestion())
                            @if($took)
                                @php
                                    $check = App\Helpers\Question::checkRightAnswer($item->id, $contest->records->where('user_id', '=', \Auth::user()->id), $contest->results);
                                    if ($check == 1)
                                        echo App\Helpers\Message::getNotify(0);
                                    if ($check == 0)
                                        echo App\Helpers\Message::getNotify(2);
                                    if ($check == -1)
                                        echo App\Helpers\Message::getNotify(1);
                                @endphp
                            @endif
							<div class="question_item">
								<label for="inputEmail3" class="control-label">Question #{{ $item->id }}</label>
								<input type="text" class='question' value="{{ $item->id }}" hidden>
								<textarea class='form-control' type='text' disabled> {{ $item->content }} </textarea>
								@if($item->answers)
									@foreach($item->answers as $ans)
										@if ($ans->question_id == $item->id )
											<div class='input-group answers_group' name='answers_group'>
												<input class='input-group-addon flat-red right-answer' name = '{{ "right-answer".$item->id }}' type='radio' {{ App\Helpers\Question::checkBox($item->id, $ans->id, $contest->records->where('user_id', '=', \Auth::user()->id)) }} >
												<input class="form-control answer" type="text" value="{{ $ans->content }}" disabled>
												<input class='form-control answer_id' type='text' value="{{ $ans->id }}" hidden >
											</div>
										@endif
									@endforeach
								@endif
							</div>
							<p>-------------------</p>
						@endif
					</div>
					<br>
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
<script>
    $(document).ready(function() {
        $('#form_submit').submit(function(e) {
            e.preventDefault();
            var data = [],
                i = 0,
                link = $(this).attr('action');

            $('.question_item').each(function() {
                data[i] = packedQuestion($(this));
                i++;
            });

            $.ajax({
                type: "POST",
                url: link,
                data: {'_token' : $('#token').val(), 'data' : data},
                success: function(){
                    location.href = '/user/contest';
                },
            });
        });
    });
    function packedQuestion(objectQuestion)
    {
        var answerObj = objectQuestion.find('.answers_group'),
            answer_id = '';

        answerObj.each(function(key, value) {
            if ($(this).find('.right-answer').is(':checked'))
                answer_id = $(this).find('.answer_id').val();
        });
        json_array = {
            "question_id" : objectQuestion.find('.question').val(),
            "answer_id" : answer_id
        };
        return json_array;
    }
</script>
@stop