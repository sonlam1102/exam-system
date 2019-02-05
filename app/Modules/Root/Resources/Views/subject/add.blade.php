@extends('root::main')

@section('content')
    <div>
        <section class="content-header">
            <h1>
                THÊM MÔN HỌC
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i> Môn học</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i> Thêm môn học</a></li>
            </ol>
            <div class="box box-primary">
                <form class="form-horizontal" method="POST" action="/root/subject/add">
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Tên môn </label>
                            <div class="col-sm-10">
                                <input class="form-control" id="name" name="name" placeholder="Title" type="text">
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