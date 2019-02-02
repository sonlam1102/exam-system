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
                            <div class='form-group'>
                                @if ($item->isBigQuestion())
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
                                        echo $val->id . ' ';
                                        }
                                    @endphp
                                    @foreach($item->subquestions as $subs)
                                        <div class="question_item">
                                            <div class="delete_question">
                                                <input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
                                                <input type="hidden" name="_method" id='method' value="delete" />
                                                <label for="inputEmail3" class="control-label">Question #{{ $subs->id }} (refernece to Question #{{ $item->id }}) </label>
                                                <button type="button" class="btn btn-sm btn-danger" id='delete' data-qid = '{{ $subs->id }} '>Delete</button>
                                            </div>
                                            <input class='form-control question_id' type='text' value="{{ $subs->id }}" hidden >
                                            <textarea class='form-control question' type='text'> {{ $subs->content }} </textarea>
                                            <label class='col-sm-2 control-label'>Answers</label>
                                            @if($subs->answers)
                                                @foreach($subs->answers as $subsansw)
                                                    <div class='input-group answers_group' name='answers_group'>
                                                        <input class='input-group-addon flat-red right-answer' name = '{{ "right-answer".$subs->id }}' type='radio' {{ App\Helpers\Question::checkBox($subs->id, $subsansw->id, $data->results) }} >
                                                        <input class="form-control answer" type="text" value="{{ $subsansw->content }}">
                                                        <input class='form-control answer_id' type='text' value="{{ $subsansw->id }}" hidden >
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                @elseif(!$item->isSubQuestion())
                                    <div class="question_item">
                                        <div class="delete_question">
                                            <input type="text" name="token" id='token' value="{{ csrf_token() }}" hidden>
                                            <input type="hidden" name="_method" id='method' value="delete" />
                                            <label for="inputEmail3" class="control-label">Question #{{ $item->id }}</label>
                                            <button type="button" class="btn btn-sm btn-danger" id='delete' data-qid = '{{ $item->id }} '>Delete</button>
                                        </div>
                                        <input class='form-control question_id' type='text' value="{{ $item->id }}" hidden >
                                        <textarea class='form-control question' type='text' > {{ $item->content }} </textarea>
                                        <label class='col-sm-2 control-label'>Answers</label>
                                        @if($item->answers)
                                            @foreach($item->answers as $ans)
                                                <div class='input-group answers_group' name='answers_group'>
                                                    <input class='input-group-addon flat-red right-answer' name = '{{ "right-answer".$item->id }}' type='radio' {{ App\Helpers\Question::checkBox($item->id, $ans->id, $data->results) }} >
                                                    <input class="form-control answer" type="text" value="{{ $ans->content }}">
                                                    <input class='form-control answer_id' type='text' value="{{ $ans->id }}" hidden >
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
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
<script>
    $(document).ready(function() {
        var num = 0;
        $('#add_new_question').click(function() {
            $('#question_field').append(questionPackGenerate(num));
            num++;
        });

        $('#add_new_big_question').click(function() {
            $('#question_field').append(bigQuestionGenerate());
            $('.big_question #add_new_subquestion').on("click", function() {
                $(this).parent().append(questionPackGenerate(num));
                num++;
            });
        });

        $('.add_one_new_subquestion').click(function() {
            var big_question = $(this).parent().find('.big_question').val();
            $('#question_field').append(subQuestionPackGenerate(num, big_question));
            num++;
        });

        $('.delete_question #delete').click(function() {
            var id = $(this).data('qid'),
                data = {},
                link = "/admin/contest/delete/";

            data = {
                '_token': $('.delete_question #token').val(),
                '_method' :$('.delete_question #method').val()
            };

            link = link + $.trim(id) + "/question";

            $.ajax({
                type: "POST",
                url: link,
                data: data,
                success: function(){
                    location.reload();
                },
            });
        });

        $("#question-form").submit(function(e) {
            var data = []
            dataUpdate = [],
                actionLink = $(this).attr('action')
            submit = {},
                i = 0,
                j = 0;
            e.preventDefault();

            $('.question_pack').each(function(key, value) {
                data[i] = packedQuestion($(this));
                i++;
            });
            $('.question_item').each(function(key, value) {
                dataUpdate[j] = packedQuestion($(this), 1);
                j++;
            });
            if ($('.question_pack').length > 0)
                submit = { '_token': $('#token').val(), 'data' : data };
            else
                submit = { '_token': $('#token').val(), 'update' :  dataUpdate};

            $.ajax({
                type: "POST",
                url: actionLink,
                data: submit,
                success: function(){
                    location.reload();
                },
            });

        });
    });
    function packedQuestion(objectQuestion, update = 0)
    {
        var answerObj = objectQuestion.find('.answers_group'),
            answer_list = [],
            j = 0,
            json_array = {};

        if (update == 1) {
            answerObj.each(function(key, value) {
                answer_list[j] = packedAnswer($(this), update);
                j++;
            });
            json_array = {
                "id" : objectQuestion.find('.question_id').val(),
                "question" : objectQuestion.find('.question').val(),
                "answer" : answer_list,
            };
        } else {
            answerObj.each(function(key, value) {
                answer_list[j] = packedAnswer($(this), update);
                j++;
            });
            if ($.trim(objectQuestion.find('.big_question_id').val()) != "undefined"
                && $.trim(objectQuestion.find('.big_question_id').val()) != "") {
                json_array = {
                    "question" : objectQuestion.find('.question').val(),
                    "answer" : answer_list,
                    "big_question_id": $.trim(objectQuestion.find('.big_question_id').val())
                };
            }
            else {
                json_array = {
                    "question" : objectQuestion.find('.question').val(),
                    "answer" : answer_list,
                };
            }
        }
        if (objectQuestion.parent().attr('class') == 'big_question')
            json_array['big_question'] = 'true';
        return json_array;
    }
    function packedAnswer(objAnswer, update = 0)
    {
        var json_array = {};
        if (update == 1) {
            json_array = {
                'id' : objAnswer.find('.answer_id').val(),
                'answer_content' : objAnswer.find('.answer').val(),
                'right_answer' : objAnswer.find('.right-answer').is(':checked'),
            };
        } else {
            json_array = {
                'answer_content' : objAnswer.find('.answer').val(),
                'right_answer' : objAnswer.find('.right-answer').is(':checked'),
            };
        }
        return json_array;
    }
    function questionPackGenerate(i = 0)
    {
        var content = "<div class='form-group question_pack'>" +
            "<label class='col-sm-2 control-label'>Question</label>" +
            "<textarea class='form-control question'></textarea>" +
            "<label class='col-sm-2 control-label'>Answers</label>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" +
            "<input class='form-control answer type='text'> " +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "</div>";
        return content;
    }
    function bigQuestionGenerate()
    {
        var content = "<div class='big_question'>" +
            "<div class='form-group question_pack'>" +
            "<label class='col-sm-2 control-label'>Big Question</label>" +
            "<textarea class='form-control question'></textarea>" +
            "</div>"+
            "<a href='javascript:void(0)' id='add_new_subquestion'>Add 1 sub question question</a>"+
            "</div>";
        return content;
    }
    function subQuestionPackGenerate(i = 0, big_question_id)
    {
        var content = "<div class='form-group question_pack'>" +
            "<label class='col-sm-2 control-label'>Question (Reference Big question #" + big_question_id +  ")</label>" +
            "<input class='form-control big_question_id' type='text' value=\" " + big_question_id +" \" hidden >" +
            "<textarea class='form-control question'></textarea>" +
            "<label class='col-sm-2 control-label'>Answers</label>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" +
            "<input class='form-control answer type='text'> " +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "<div class='input-group answers_group'>" +
            "<input class='input-group-addon flat-red right-answer' name ='answers_group " + i +"' type='radio'>" +
            "<input class='form-control answer type='text' >" +
            "</div>" +
            "</div>";
        return content;
    }
</script>
@stop