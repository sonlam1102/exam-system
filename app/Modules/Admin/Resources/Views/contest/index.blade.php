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
          <a href="/admin/contest/add"><button type="button" class="btn btn-block btn-primary" style="width:50px">Add</button></a>
      <div class="box-primary">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Field</th>
                    <th>Number questions</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  @if ($data)
                    @foreach($data as $item)
                      <tr>
                        <td> {{ $item->id }}</td>
                        <td> {{ $item->title }}</td>
                        <td> {{ $item->subject_id }}</td>
                        <td> {{ App\Questions::countQuestionByContest($item->id) }}</td>
                        <td> {{ date('d/m/Y', strtotime($item->date)) }}</td>
                        <td>
                          <a href="/admin/contest/edit/{{ $item->id }}"><button type="button" class="btn btn-success">Edit</button></a>
                          <a href="/admin/contest/{{ $item->id }}/candidate"><button type="button" class="btn btn-primary">Status</button></a>
                          <form class="btn" action="/admin/contest/delete/{{ $item->id }}" method="POST">
                            @csrf
                            <input type="hidden" name="_method" value="delete" />
                            <button type="submit" class="btn btn-danger">Delete</button>
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
