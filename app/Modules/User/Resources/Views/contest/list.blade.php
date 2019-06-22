@extends('user::main')
@section('content')
    <h1 class="my-4">
        DANH SÁCH CÁC BÀI TẬP
    </h1>
    <div>
        {{ $data->links() }}
    </div>
    <div class="row">
        @if ($data)
            @foreach($data as $item)
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="javascript:void(0)"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <label>{{ $item->title }}</label>
                            </h4>
                            <p class="card-text">Ngày bắt đầu: {{ ($item->date) ? date('d/m/Y', strtotime($item->date)) : '' }} </p>
                            <p class="card-text">Môn học: {{ $item->subject->name }} </p>
                            <p class="card-text">Số câu hỏi: {{ $item->total_questions }} </p>
                            @if ($lasted = App\Model\UserLog::getLastedLog(\Auth::user()->id, $item->id))
                                <p class="card-text">Kết quả: {{ $lasted->result }} </p>
                            @endif
                        </div>
                        @if (!App\Model\UserRecord::isTookTheContest(\Auth::user()->id, $item->id))
                            <a href="/user/contest/{{ $item->id }}">
                                <button type="submit" class="btn btn-info">Làm bài!</button>
                            </a>
                        @else
                            <a href="/user/contest/{{ $item->id }}">
                                <button type="submit" class="btn btn-info">Xem lại</button>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div>
        {{ $data->links() }}
    </div>

@stop