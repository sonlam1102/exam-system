@extends('admin::main')

@section('content')
    <div>
        <section class="content-header">
            <h1>
                BÀI TẬP
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i> Thông tin bài tập</a></li>
            </ol>
            <div class="box-primary">
                <div class="col-xs-15">
                    <div class="box">
                        <!-- /.box-header -->
                        <form class="form-horizontal" method="POST" action="/admin/contest/edit/{{ $id }}/info">
                            @csrf
                            <div class="box-body">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label"> Tên bài tập </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="title" name="title" placeholder="Title"
                                               type="text" value="{{ $data->title }}">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Ngày </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="startdate" name="startdate" placeholder="Date"
                                               type="text"
                                               data-date="{{ ($data->date) ? date('d-m-Y' ,strtotime($data->date)) : date('d-m-Y') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Môn học</label>
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

                                <div class="form-group">
                                    <div class="col-sm-10">
                                        <label><input type="checkbox" {{ $data->is_show ? 'checked' : '' }} name="is_show" id="is_show"> Hiển thị </label>
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
                                <a href="javascript:void(0)" id="add_new_question">Thêm câu hỏi </a>
                                <br>
                                <a href="javascript:void(0)" id="add_new_big_question">Thêm câu hỏi lớn </a>
                            </div>
                            <div class="box-body" id='question_field'>
                                @if ($data->questions)
                                    @foreach($data->questions as $item)
                                        <div class='form-group'>
                                            @if ($item->isBigQuestion())
                                                <div class="delete_question">
                                                    <input type="text" name="token" id='token'
                                                           value="{{ csrf_token() }}" hidden>
                                                    <input type="hidden" name="_method" id='method' value="delete"/>
                                                    <strong>
                                                        <label for="inputEmail3" class="control-label">Câu hỏi lớn
                                                            #{{ $item->id }}</label>
                                                    </strong>
                                                    <button type="button" class="btn btn-sm btn-danger" id='delete'
                                                            data-qid='{{ $item->id }} '>Xoá
                                                    </button>
                                                </div>

                                                <div class="question_image col-4">
                                                    <input type="text" name="token" id='token'
                                                           value="{{ csrf_token() }}" hidden>

                                                    <input type='file' id="quest_image{{ $item->id }}">

                                                    <button type="button" class="btn btn-sm btn-info" id='upload'
                                                            data-qid='{{ $item->id }} '>Thêm hình câu hỏi
                                                    </button>
                                                </div>

                                                <input class='form-control question_id' type='text'
                                                       value="{{ $item->id }}" hidden>
                                                <textarea class='form-control question'
                                                          type='text'> {{ $item->content }} </textarea>

                                                <p>
                                                    @if($item->img)
                                                        <img src="{{ $item->img }}" alt="Question #{{ $item->id }}" class="image_contest">
                                                    @endif
                                                </p>

                                                <label class='col-sm-2 control-label'>Answers</label>

                                                <a href='javascript:void(0)' class='add_one_new_subquestion'>Thêm câu hỏi nhỏ</a>
                                                <input class='form-control big_question' type='text'
                                                       value="{{ $item->id }}" hidden>
                                                <br>
                                                Câu hỏi lớn này gồm các câu hỏi sau:
                                                <strong>
                                                    @php
                                                        $subquestionData = $item->subquestions;
                                                        foreach($subquestionData as $val) {
                                                            echo $val->id . ' ';
                                                        }
                                                    @endphp
                                                </strong>
                                                <br>
                                                <br>
                                                @foreach($item->subquestions as $subs)
                                                    <div class="question_item">
                                                        <div class="delete_question">
                                                            <input type="text" name="token" id='token'
                                                                   value="{{ csrf_token() }}" hidden>
                                                            <input type="hidden" name="_method" id='method'
                                                                   value="delete"/>
                                                            <strong>
                                                                <label for="inputEmail3" class="control-label">Câu hỏi
                                                                    #{{ $subs->id }} (Theo câu hỏi lớn #{{ $item->id }}
                                                                    ) </label>
                                                            </strong>
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                    id='delete' data-qid='{{ $subs->id }} '>Xoá
                                                            </button>
                                                            <br>
                                                        </div>

                                                        <div class="question_image col-4">
                                                            <input type="text" name="token" id='token'
                                                                   value="{{ csrf_token() }}" hidden>

                                                            <input type='file' id="quest_image{{ $subs->id }}">

                                                            <button type="button" class="btn btn-sm btn-info" id='upload'
                                                                    data-qid='{{ $subs->id }} '>Thêm hình ảnh
                                                            </button>
                                                        </div>

                                                        <input class='form-control question_id' type='text'
                                                               value="{{ $subs->id }}" hidden>
                                                        <textarea class='form-control question'
                                                                  type='text'> {{ $subs->content }} </textarea>

                                                        <p>
                                                            @if($subs->img)
                                                                <img src="{{ $subs->img }}" alt="Question #{{ $subs->id }}" class="image_contest">
                                                            @endif
                                                        </p>

                                                        <label class='col-sm-2 control-label'>Các câu trả lời: </label>
                                                        @if($subs->answers)
                                                            @foreach($subs->answers as $subsansw)
                                                                <div class='input-group answers_group'
                                                                     name='answers_group'>
                                                                    <input class='input-group-addon flat-red right-answer'
                                                                           name='{{ "right-answer".$subs->id }}'
                                                                           type='radio' {{ App\Helpers\Question::checkBox($subs->id, $subsansw->id, $data->results) }} >
                                                                    <input class="form-control answer" type="text"
                                                                           value="{{ $subsansw->content }}">
                                                                    <input class='form-control answer_id' type='text'
                                                                           value="{{ $subsansw->id }}" hidden>

                                                                    @if($subsansw->img)
                                                                        <img src="{{ $subsansw->img }}" alt="Answer #{{ $subsansw->id }}" class="image_contest">
                                                                    @endif

                                                                </div>
                                                                <br>

                                                                <div class="input-group answer_image col-4">
                                                                    <input type="text" name="token" id='token'
                                                                           value="{{ csrf_token() }}" hidden>

                                                                    <input type='file' id="answ_image{{ $subsansw->id }}">

                                                                    <button type="button" class="btn btn-sm btn-info" id='upload'
                                                                            data-qid='{{ $subsansw->id }} '>Thêm hình ảnh
                                                                    </button>
                                                                </div>
                                                                <br>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @elseif(!$item->isSubQuestion())
                                                <div class="question_item">
                                                    <div class="delete_question">
                                                        <input type="text" name="token" id='token'
                                                               value="{{ csrf_token() }}" hidden>
                                                        <input type="hidden" name="_method" id='method' value="delete"/>
                                                        <strong>
                                                            <label for="inputEmail3" class="control-label">Câu hỏi
                                                                #{{ $item->id }}</label>
                                                        </strong>
                                                        <button type="button" class="btn btn-sm btn-danger" id='delete'
                                                                data-qid='{{ $item->id }} '>Xoá
                                                        </button>

                                                    </div>

                                                    <div class="question_image col-4">
                                                        <input type="text" name="token" id='token'
                                                               value="{{ csrf_token() }}" hidden>

                                                        <input type='file' id="quest_image{{ $item->id }}">

                                                        <button type="button" class="btn btn-sm btn-info" id='upload'
                                                                data-qid='{{ $item->id }} '>Thêm hình câu hỏi
                                                        </button>
                                                    </div>


                                                    <input class='form-control question_id' type='text'
                                                           value="{{ $item->id }}" hidden>
                                                    <textarea class='form-control question'
                                                              type='text'> {{ $item->content }} </textarea>

                                                   <p>
                                                       @if($item->img)
                                                           <img src="{{ $item->img }}" alt="Question #{{ $item->id }}" class="image_contest">
                                                       @endif
                                                   </p>

                                                    <label class='col-sm-2 control-label'>Answers</label>
                                                    @if($item->answers)
                                                        @foreach($item->answers as $ans)
                                                            <div class='input-group answers_group' name='answers_group'>
                                                                <input class='input-group-addon flat-red right-answer'
                                                                       name='{{ "right-answer".$item->id }}'
                                                                       type='radio' {{ App\Helpers\Question::checkBox($item->id, $ans->id, $data->results) }} >
                                                                <input class="form-control answer" type="text"
                                                                       value="{{ $ans->content }}">
                                                                <input class='form-control answer_id' type='text'
                                                                       value="{{ $ans->id }}" hidden>

                                                                @if($ans->img)
                                                                    <img src="{{ $ans->img }}" alt="Answer #{{ $ans->id }}" class="image_contest">
                                                                @endif

                                                            </div>
                                                            <br>

                                                            <div class="input-group answer_image col-4">
                                                                <input type="text" name="token" id='token'
                                                                       value="{{ csrf_token() }}" hidden>

                                                                <input type='file' id="answ_image{{ $ans->id }}">

                                                                <button type="button" class="btn btn-sm btn-info" id='upload'
                                                                        data-qid='{{ $ans->id }} '>Thêm hình ảnh
                                                                </button>
                                                            </div>
                                                            <br>

                                                        @endforeach
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                        <hr>
                                    @endforeach
                                @endif
                            </div>
                            <input type="text" name="data" id='data' hidden>

                            <div class="box-footer">
                                <button type="submit" id='submit' class="btn btn-info pull-left">Cập nhật </button>
                            </div>

                            <div class="box-header">
                                <a href="javascript:void(0)" id="add_new_question_last_page">Thêm câu hỏi </a>
                                <br>
                                <a href="javascript:void(0)" id="add_new_big_question_last_page">Thêm câu hỏi lớn </a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection