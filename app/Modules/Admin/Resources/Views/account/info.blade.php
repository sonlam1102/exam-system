@extends('admin::main')

@section('content')
<div>
	<section class="content-header">
      <h1>
        Account Info
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Account Info</a></li>
      </ol>
      	<div class="box box-primary">
            <form class="form-horizontal" >

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
                    <input class="form-control" id="birthday" name="birthday" placeholder="Birthday" type="text" value="{{ $data->birthday }}">
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
                    <input class="form-control" id="retype-password" name="retype-password" placeholder="Password" type="password">
                  </div>
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">Submit</button>
              </div>

            </form>
        </div>
    </section>
</div>
<script>
	$('input[name="birthday"]').daterangepicker({
	    singleDatePicker: true,
	    showDropdowns: true
	});
</script>
@endsection
