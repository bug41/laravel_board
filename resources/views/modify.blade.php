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
                    
                    <form action="{{route('modify_proc')}}" method="POST">
                        <input type="hidden" name="email" value="{{$viewData[0]->email}}">
                        <input type="hidden" name="id" value="{{$viewData[0]->id}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="제목 넣어라" id="title" name="title" value="{{$viewData[0]->title}}">
                        </div>
                        <div class="form-group">                            
                            <textarea class="form-control" rows="10" id="content" name="content" placeHolder="입벌려 내용 들어간다">{{$viewData[0]->content}}</textarea>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-primary" onclick="javascript:location.href='{{ url('/boards') }}'">목록</button>
                            <button type="submit" class="btn btn-primary">수정</button>
                            <button type="button" class="btn btn-primary" onclick="board_delete('{{$viewData[0]->id}}')">삭제</button>
                        </div>
                    </form>                    
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function board_delete(id){
        if(confirm("정말 글을 삭제하시겠냐?")){
            location.href='/deleteBoards?id={{$viewData[0]->id}}';
        }        
    }
</script>