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
                    <div class="text-center">
                        <button type="button" class="btn btn-primary" onclick="javascript:location.href='{{ route('boards') }}'">{{ __('게시판 바로가기') }}</button>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
