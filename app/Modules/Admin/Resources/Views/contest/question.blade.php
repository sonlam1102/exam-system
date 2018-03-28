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
              <form class="form-horizontal" method="POST" action="/admin/contest/edit/{{ $id }}/info">
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
                      <input class="form-control" id="startdate" name="startdate" placeholder="Date" type="text" data-date="{{ ($data->date) ? date('m/d/Y' ,strtotime($data->date)) : date('m/d/Y') }}" >
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
                  <button type="submit" id='submit' class="btn btn-info pull-left">Submit</button>
                </div>

              </form>
            </div>
            <div class="box">
              <form id='question-form' >
                <input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
                <div class="box-header">
                  <a href="javascript:void(0)" id="add_new_question">Add 1 question</a>
                </div>
                <div class="box-body" id='question_field'>
                    @if ($questions)
                      @foreach($questions as $item)
                       <div class='form-group question_pack'>         
                          <label for="inputEmail3" class="col-sm-2 control-label">Question</label>
                          <input class='form-control question' type='text' value="{{ $item->content }}">"
                          <div class='form-group answers_group'>
                              
                          </div>
                          @php $mdlAnswer = new App\Answer() @endphp
                            @if($answers = $mdlAnswer->get_all_answers($item->id))
                              @foreach($answers as $ans)
                                <div class='input-group answers_group'>
                                  <input class='input-group-addon flat-red right-answer' type='checkbox'>
                                  <input class="form-control answer" type="text" value="{{ $ans->content }}">
                                </div>
                              @endforeach
                          @endif
                        </div>
                      @endforeach
                    @endif
                </div>
                <input type="text" name="data" id='data' hidden>
                <div class="box-footer">
                 <button type="submit" id='submit' class="btn btn-info pull-left">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection
@section('javascript')
<script type="text/javascript">
    $(function() {
        $('#startdate').daterangepicker({
            singleDatePicker: true,
            "startDate": $('#startdate').data('date'),
            format: 'DD/MM/YYYY',
            showDropdowns: true,
        });
  });
</script>
<script src="/admin/js/question.js"></script>
@stop