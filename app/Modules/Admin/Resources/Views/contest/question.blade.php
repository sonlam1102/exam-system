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
                      <input class="form-control" id="startdate" name="startdate" placeholder="Date" type="text" data-date="{{ ($data->date) ? date('d-m-Y' ,strtotime($data->date)) : date('d-m-Y') }}" >
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
                  <button type="submit" id='submit' class="btn btn-info pull-left">Edit info</button>
                </div>

              </form>
            </div>
            <div class="box">
              <form id='question-form' action='/admin/contest/edit/{{ $id }}/question'>
                <input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
                <div class="box-header">
                  <a href="javascript:void(0)" id="add_new_question">Add 1 question</a>
                  <a href="javascript:void(0)" id="add_new_big_question">Add 1 big question</a>
                </div>
                <div class="box-body" id='question_field'>
                    @if ($data->questions)
                        @foreach($data->questions as $item)
                            <div class='form-group question_item'>
                                @if (\App\Subquestion::isBigQuestion($item->id))
                                    <div class="delete_question">
                                        <input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
                                        <input type="hidden" name="_method" id='method' value="delete" />
                                        <label for="inputEmail3" class="control-label">Big Question #{{ $item->id }}</label>
                                        <button type="button" class="btn btn-sm btn-danger" id='delete' data-qid = '{{ $item->id }} '>Delete</button>
                                    </div>
                                    <input class='form-control question_id' type='text' value="{{ $item->id }}" hidden >
                                    <textarea class='form-control question' type='text'> {{ $item->content }} </textarea>
                                    <label class='col-sm-2 control-label'>Answers</label>

                                    <a href='javascript:void(0)' class='add_one_new_subquestion'>Add 1 sub question question</a>
                                    <input class='form-control big_question' type='text' value="{{ $item->id }}" hidden >
                                    <br>
                                    This question is based on those answers:
                                    @php
                                        $subquestionData = $item->subquestions;
                                        foreach($subquestionData as $val) {
                                        echo $val->subquestion_id . ' ';
                                        }
                                    @endphp
                                @elseif(\App\Subquestion::isSubQuestion($item->id))
                                    <div class="delete_question">
                                       <input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
                                       <input type="hidden" name="_method" id='method' value="delete" />
                                       <label for="inputEmail3" class="control-label">Question #{{ $item->id }} (refernece to Question #{{ $item->questionparent->question_id }}) </label>
                                       <button type="button" class="btn btn-sm btn-danger" id='delete' data-qid = '{{ $item->id }} '>Delete</button>
                                   </div>
                                   <input class='form-control question_id' type='text' value="{{ $item->id }}" hidden >
                                   <textarea class='form-control question' type='text'> {{ $item->content }} </textarea>
                                   <label class='col-sm-2 control-label'>Answers</label>
                                @else
                                    <div class="delete_question">
                                        <input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
                                        <input type="hidden" name="_method" id='method' value="delete" />
                                        <label for="inputEmail3" class="control-label">Question #{{ $item->id }}</label>
                                        <button type="button" class="btn btn-sm btn-danger" id='delete' data-qid = '{{ $item->id }} '>Delete</button>
                                    </div>
                                    <input class='form-control question_id' type='text' value="{{ $item->id }}" hidden >
                                    <textarea class='form-control question' type='text' > {{ $item->content }} </textarea>
                                    <label class='col-sm-2 control-label'>Answers</label>
                                @endif

                                @if($data->answers)
                                        @foreach($data->answers as $ans)
                                            @if ($ans->question_id == $item->id)
                                                <div class='input-group answers_group' name='answers_group'>
                                                    <input class='input-group-addon flat-red right-answer' name = '{{ "right-answer".$item->id }}' type='radio' {{ App\Helpers\Question::checkBox($item->id, $ans->id, $data->results) }} >
                                                    <input class="form-control answer" type="text" value="{{ $ans->content }}">
                                                    <input class='form-control answer_id' type='text' value="{{ $ans->id }}" hidden >
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                            </div>
                            <br>
                        @endforeach
                    @endif
                </div>
                  <input type="text" name="data" id='data' hidden>
                  <div class="box-footer">
                      <button type="submit" id='submit' class="btn btn-info pull-left">Add question</button>
                  </div>
              </form>
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
            locale: {
              format: 'DD-MM-YYYY'
            },
            singleDatePicker: true,
            "startDate": $('#startdate').data('date'),
            showDropdowns: true,

        });
  });
</script>
<script src="/admin/js/question.js"></script>
@stop