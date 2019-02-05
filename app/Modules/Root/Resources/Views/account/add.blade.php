@extends('root::main')

@section('content')
    <section class="content-header">
        <h1>
            THÊM ADMIN
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Thêm admin</a></li>
        </ol>
        <div class="box box-primary">
            <form method="POST" action="/root/user/add">
                @csrf
                <div class="box-body">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Tên</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="name" name="name" placeholder="Name" type="text">
                        </div>
                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-left">Thêm</button>
                    </div>

                </div>
            </form>
            <!-- <label>Contest done</label> -->
        </div>
    </section>
@stop