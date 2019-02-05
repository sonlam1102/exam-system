@extends('admin::main')
@section('content')
    <section class="content-header">
        <h1>
            DANH SÁCH THÍ SINH
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Bài tập</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Danh sách thí sinh</a></li>
        </ol>
        <div class="box-primary">
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th>Tên thí sinh</th>
                                <th>Bài tập </th>
                                <th>Kết quả</th>
                                <th>Ngày nộp</th>
                            </tr>
                            @if ($data)
                                @foreach($data as $item)
                                    <tr>
                                        <td>
                                            <a href="/admin/user/info/{{ $item->user_id }}"> {{ $item->user->name }} </a>
                                        </td>
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@stop