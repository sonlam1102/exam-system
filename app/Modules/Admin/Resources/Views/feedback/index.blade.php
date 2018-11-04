@extends('admin::main')

@section('content')
<div>
	<section class="content-header">
      <h1>
        User accounts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Feedback</a></li>
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
                    <th>UserID</th>
                    <th>Content</th>
                  </tr>
                  @if ($data)
                    @foreach($data as $item)
                      <tr>
                        <td> {{ $item->id }}</td>
                        <td> <a href="/admin/user/info/{{ $item->user_id }}"> {{ $item->user->name }}</td>
                        <td> {{ $item->content }}</td>
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
