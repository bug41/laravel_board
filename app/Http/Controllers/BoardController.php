<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Boards;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function boards(){ 
        //$listData = Boards::all();        
        $listData = DB::table('boards')->select('*')->orderByRaw('id desc')->paginate(3);
        //$countData = DB::table('boards')->count;
        $idx = $listData->firstItem();
        return view('boards',compact('listData'),['idx' => $idx]);
    }
    

    /* 글 상세페이지 */
    public function view(Request $request){        
        $viewData = DB::select('select * from boards where id = :id', ['id' => $request->id]);
        return view('view', ['viewData' => $viewData]);
    }

    public function insert(){         
        return view('insert');
    }
    public function insert_proc(Request $request)
    {        
        Boards::insert([
            'email' => $request->user()->email,
            'title' => $request->title,
            'content' => $request->content,
            'reg_date' => Carbon::now()
        ]);

        return redirect('/boards');
    }

    public function modifyBoards(Request $request)
    {   
        $viewData = DB::select('select * from boards where id = :id', ['id' => $request->id]);
        return view('modify', ['viewData' => $viewData]);
    }

    public function modify_proc(Request $request){

        $this->validate($request, [
            'title' => ['required'],
            'content' => ['required'],
        ]);
        
        Boards::where('id', $request->id)
        ->update(
            ['title' => $request->title,
            'content' => $request->content,
            ]
        );

        return redirect('/boards');
    }

    public function deleteBoards(Request $request){
        DB::table('boards')->where('id', '=', $request->id)->delete();
        return redirect('/boards');
    }
}
