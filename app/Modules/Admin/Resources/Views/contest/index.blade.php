@extends('admin::main')

@section('content')
    <div>
        <section class="content-header">
            <h1>
                DANH SÁCH BÀI TẬP
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i> Danh sách bài tập</a></li>
            </ol>
            <a href="/admin/contest/add">
                <button type="button" class="btn btn-block btn-primary" style="width:130px">Thêm bài tập</button>
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
                                    <th>Tiêu đề </th>
                                    <th>Môn học </th>
                                    <th>Số câu hỏi </th>
                                    <th>Ngày </th>
                                    <th>Hiển thị </th>
                                    <th>Các thao tác</th>
                                </tr>
                                @if ($data)
                                    @foreach($data as $item)
                                        <tr>
                                            <td> {{ $item->id }}</td>
                                            <td> {{ $item->title }}</td>
                                            <td> {{ $item->subject->name }}</td>
                                            <td> {{ $item->total_questions }}</td>
                                            <td> {{ date('d/m/Y', strtotime($item->date)) }}</td>
                                            <td> {{ $item->is_show ? 'Có' : 'Không' }} </td>
                                            <td>
                                                <a href="/admin/contest/edit/{{ $item->id }}">
                                                    <button type="button" class="btn btn-sm btn-success">Edit</button>
                                                </a>
                                                <a href="/admin/contest/{{ $item->id }}/candidate">
                                                    <button type="button" class="btn btn-sm btn-primary">Status</button>
                                                </a>
                                                <form class="btn" action="/admin/contest/delete/{{ $item->id }}"
                                                      method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="delete"/>
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
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
