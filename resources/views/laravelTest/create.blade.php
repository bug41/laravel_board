@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Create Page</h1>

            <form action="{{ route('laravelTest.store') }}" method="POST">
                @csrf
                <input type="text" name="title" placeHolder="이이이잉ㅇ">
                <input type="text" name="description" placeHolder="dddd">
                <button>Save</button>
            </form>

        </div>
    </div>
</div>
@endsection
