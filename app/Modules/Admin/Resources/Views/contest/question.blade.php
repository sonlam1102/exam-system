@extends('admin::main')

@section('content')
<div>
	<section class="content-header">
      <h1>
        Contests
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Contest Info</a></li>
      </ol>
      <div class="box-primary">
        <div class="col-xs-15">
          <div class="box">
            <!-- /.box-header -->
              <form class="form-horizontal" method="POST" action="/admin/contest/edit/{{ \Auth::user()->id }}">
                @csrf
                <div class="box-body">

                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="title" name="title" placeholder="Title" type="text" value="{{ $data->title }}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Date</label>
                    <div class="col-sm-10">
                      <input class="form-control" id="date" name="date" placeholder="Date" type="text" value="{{ date('d/m/Y', strtotime($data->date)) }}">
                    </div>
                  </div>

                 <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
                    <div class="col-sm-10">
                      <select class="form-control" id='subject' name='subject'>
                        <option value="" disabled>--Choose subject---</option>
                        @if ($subject)
                          @foreach ($subject as $item)
                            <option value="{{ $item->id }}" {{ ($data->subject_id == $item->id) ? 'selected' : '' }}> {{ $item->name }}</option>
                          @endforeach
                        @endif
                      </select>
                    </div>
                  </div>

                </div>

              </form>
            </div>
            <div class="box">
              <div class="box-header">
                <a href="javascript:void(0)" id="add_new_question">Add 1 question</a>
              </div>
              <div class="box-body" id='question_field'>

              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-left">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
@section('javascript')
<script src="/admin/js/question.js"></script>
<script type="text/javascript">
   $(function() {
    $('#date').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
  });
</script>
@stop