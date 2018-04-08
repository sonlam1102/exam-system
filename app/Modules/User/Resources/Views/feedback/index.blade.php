@extends('user::main')
@section('content')
<section class="content-header">
	<h1 class="my-4">
		Feedback
	</h1>
	<div class="container">
	<form action="/user/feedback/add/{{ \Auth::user()->id }}" method="POST">
		@csrf
		<div class="box-body" >
			<textarea class='form-control feedback' name='content' type='text'> </textarea>
		</div>
		<br>
		<div class="box-footer">
			<button type="submit" id='submit' class="btn btn-info">Submit</button>
		</div>
	</form>
	</div>
	<div class="form-group row">
        <div class="col-md-6 justify-content-center">
            @if (\Session::has('success'))
                <span>
                    <strong>{!!Session::get('success')!!}</strong>
                </span>
            @endif
        </div>
    </div>
</section>
<br>
<br>
@stop