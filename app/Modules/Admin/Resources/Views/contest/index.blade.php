@extends('admin::main')

@section('content')
<div>
	<section class="content-header">
      <h1>
        Contests
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Contest</a></li>
      </ol>
      <div class="row">
        <div class="col-xs-12">
          <a href="/admin/contest/add"><button type="button" class="btn btn-block btn-primary">Add</button></a>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Field</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  @if ($data)
                    @foreach($data as $item)
                      <tr>
                        <td> {{ $item->id }}</td>
                        <td> {{ $item->title }}</td>
                        <td> {{ $item->subject_id }}</td>
                        <td> {{ $item->date }}</td>
                        <td></td>
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
