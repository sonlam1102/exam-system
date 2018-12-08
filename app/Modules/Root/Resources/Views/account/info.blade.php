@extends('root::main')

@section('content')
	<section class="content-header">
      <h1>
        Account Info
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Account Info</a></li>
      </ol>
      	<div class="box box-primary">
            <form class="form-horizontal" method="POST" action="/root/update/{{ \Auth::user()->id }}">
              @csrf
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" value="{{ $data->email }}" disabled>
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" value="{{ $data->name }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="address" name="address" placeholder="Address" type="text" value="{{ $data->address }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Birthday</label>
                  <div class="col-sm-10">
                    <input class="form-control" id="birthday" name="birthday" placeholder="Birthday" type="text" data-date="{{ ($data->birthday) ? date('d-m-Y' ,strtotime($data->birthday)) : date('m-d-Y') }}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="password" name="password" placeholder="Password" type="password">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Retype Password</label>

                  <div class="col-sm-10">
                    <input class="form-control" id="retype_password" name="retype_password" placeholder="Password" type="password">
                  </div>
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">Submit</button>
              </div>

             <div class="col-md-6 justify-content-center">
                @if (\Session::has('error'))
                  <span>
                      <strong>{!!Session::get('error')!!}</strong>
                  </span>
                @endif
              </div>
            </form>
        </div>
    </section>
@stop
@section('javascript')
<script type="text/javascript">
   $(function() {
    $('#birthday').daterangepicker({
        locale: {
            format: 'DD-MM-YYYY'
        },
        singleDatePicker: true,
        "startDate": $('#birthday').data('date'),
        showDropdowns: true,
    });
  });
</script>
@stop