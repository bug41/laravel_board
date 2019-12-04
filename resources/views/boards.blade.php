@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">게시판 테스트</div>                    
                <div class="card-body">                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-hover text-center">
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>아이디</th>
                                <th>등록날짜</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listData as $data)
                            <tr onclick="javascript:location.href='/view?id={{$data->id}}'">
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->title }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->reg_date }}</td>
                            </tr>                            
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-right">
                        <button type="button" class="btn btn-primary" onclick="javascript:location.href='{{ route('insert') }}'">{{ __('글쓰기') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
