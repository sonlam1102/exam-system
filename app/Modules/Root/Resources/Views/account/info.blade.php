@extends('root::main')

@section('content')
    <section class="content-header">
        <h1>
            THÔNG TIN TÀI KHOẢN
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Account Info</a></li>
        </ol>
        <div class="box box-primary">
            <form class="form-horizontal" method="POST" action="/root/update" enctype="multipart/form-data">
                @csrf
                <div class="box-body">

                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type='file' onchange="readURL(this);" name="img" />

                        </div>
                        <div class="col-sm-10">
                            <img id="blah" src="{{ \Auth::user()->img }}" alt="your image" onerror="this.src='/avatar.jpg'"/>
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
                                   value="{{ $data->name }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Địa chỉ</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="address" name="address" placeholder="Address" type="text"
                                   value="{{ $data->address }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Ngày sinh</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="birthday" name="birthday" placeholder="Birthday" type="text"
                                   data-date="{{ ($data->birthday) ? date('d-m-Y' ,strtotime($data->birthday)) : date('m-d-Y') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Mật khẩu</label>

                        <div class="col-sm-10">
                            <input class="form-control" id="password" name="password" placeholder="Password"
                                   type="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Nhập lại mật khẩu</label>

                        <div class="col-sm-10">
                            <input class="form-control" id="retype_password" name="retype_password"
                                   placeholder="Password" type="password">
                        </div>
                    </div>

                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-left">Cập nhật</button>
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
        $(function () {
            $('#birthday').daterangepicker({
                locale: {
                    format: 'DD-MM-YYYY'
                },
                singleDatePicker: true,
                "startDate": $('#birthday').data('date'),
                showDropdowns: true,
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@stop