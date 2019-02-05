@extends('admin::main')

@section('content')
    <section class="content-header">
        <h1>
            THÔNG TIN THÍ SINH
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Thông tin thí sinh </a></li>
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
                    <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
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
            <div class="box-body">
                <label for="inputEmail3" class="col-sm-4 control-label">Các bài tập đã hoàn thành: </label>
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Kết quả</th>
                        <th>Ngày</th>
                    </tr>
                    @if ($data->logs)
                        @foreach($data->logs as $item)
                            <tr>
                                <td>
                                    <a href="/admin/contest/edit/{{ $item->contest_id }}"> {{ $item->contest->title }} </a>
                                </td>
                                <td> {{ $item->result }}</td>
                                <td> {{ date('d/m/Y', strtotime($item->date)) }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop