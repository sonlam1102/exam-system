@extends('admin::main')

@section('content')
    <div>
        <section class="content-header">
            <h1>
                THÊM BÀI TẬP
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i> Thêm bài tập </a></li>
            </ol>
            <div class="box box-primary">
                <form class="form-horizontal" method="POST" action="/admin/contest/add">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tiêu đề</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="title" name="title" placeholder="Title" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Môn học</label>
                            <div class="col-sm-10">
                                <select class="form-control" id='subject' name='subject'>
                                    <option value="" disabled>--Vui lòng chọn---</option>
                                    @if ($subject)
                                        @foreach ($subject as $item)
                                            <option value="{{ $item->id }}"> {{ $item->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Ngày</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="date" name="date" placeholder="Date" type="text">
                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-left">Thêm</button>
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
    </div>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(function () {
            $('#date').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'DD-MM-YYYY'
                },
            });
        });
    </script>
@stop