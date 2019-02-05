@extends('root::main')

@section('content')
    <section class="content-header">
        <h1>
            THÔNG TIN TÀI KHOẢN
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Thông tin tài khoản</a></li>
        </ol>
        <div class="box box-primary">
            <div class="box-body">

                <div class="form-group">
                    <div class="col-sm-10">
                        <img id="blah" src="{{ $data->img }}" alt="your image" onerror="this.src='/avatar.jpg'" width="200px" height="200px"/>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email"
                               value="{{ $data->email }}" disabled>
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text"
                               value="{{ $data->name }}" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ </label>
                    <div class="col-sm-10">
                        <input class="form-control" id="address" name="address" placeholder="Address" type="text"
                               value="{{ $data->address }}" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Ngày sinh</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="birthday" name="birthday" placeholder="Birthday" type="text"
                               value="{{ ($data->birthday) ? date('d-m-Y' ,strtotime($data->birthday)) : date('m-d-Y') }}"
                               disabled>
                    </div>
                </div>

            </div>
            <!-- <label>Contest done</label> -->
        </div>
    </section>
@stop