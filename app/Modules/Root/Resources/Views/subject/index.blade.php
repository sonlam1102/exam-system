@extends('root::main')

@section('content')
    <div>
        <section class="content-header">
            <h1>
                DANH SÁCH MÔN HỌC
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i> Môn học</a></li>
            </ol>
            <a href="/root/subject/add">
                <button type="button" class="btn btn-block btn-primary" style="width:70px">Thêm</button>
            </a>
            <div class="box-primary">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Môn học</th>
                                </tr>
                                @if ($data)
                                    @foreach($data as $item)
                                        <tr>
                                            <td> {{ $item->id }}</td>
                                            <td> {{ $item->name }}</td>
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
    </div>
@endsection
