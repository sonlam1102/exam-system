@extends('user::main')
@section('content')
<h1 class="my-4">
	Available exams
</h1>
 <div class="row">
 	@if ($data)
 		@foreach($data as $item)
 			<div class="col-lg-4 col-sm-6 portfolio-item">
		        <div class="card h-100">
		           	<a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
		            <div class="card-body">
		              <h4 class="card-title">
		                <label>{{ $item->title }}</label>
		              </h4>
		              <p class="card-text">Date Begin: {{ $item->date }} </p>
		              <p class="card-text">Subject: {{ App\Subjects::getName($item->subject_id) }} </p>
		              <p class="card-text">Number questions: {{ App\Questions::countQuestionByContest($item->id) }} </p>
		            </div>
		        </div>
		    </div>
 		@endforeach
 	@endif;
 </div>

@stop