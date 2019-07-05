@extends('admin::main')

@section('content')
    <div>
        <section class="content-header">
            <h1>
                DANH SÁCH TÀI KHOẢN THÍ SINH
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#"><i class="fa fa-dashboard"></i> Tài khoản thí sinh</a></li>
            </ol>
            <div class="box-primary">
                <div class="col-xs-12">
                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên </th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Ngày sinh</th>
                                    <th>Các thao tác </th>
                                </tr>
                                @if ($data)
                                    @foreach($data as $item)
                                        <tr>
                                            <td> {{ $item->id }}</td>
                                            <td> {{ $item->name }}</td>
                                            <td> {{ $item->email }}</td>
                                            <td> {{ $item->address }}</td>
                                            <td> {{ ($item->birthday) ? date('d/m/Y', strtotime($item->birthday)) : '' }}</td>
                                            <td style="width: 20%">
                                                <a href="/admin/user/info/{{ $item->id }}">
                                                    <button type="button" class="btn btn-sm btn-primary">Thông tin</button>
                                                </a>

                                                <form class="btn" method="post" action="/admin/user/{{ $item->id }}/reset">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-warning">Khôi phục</button>
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
