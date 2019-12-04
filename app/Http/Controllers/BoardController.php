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
        $listData = Boards::all()->sortByDesc("id");
        return view('boards',compact('listData'));
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
        //dd($request->url());
        //return $request->all();
        
        /*
        $Boards = new Boards;
        $Boards->email = $request->user()->id;
        $Boards->title = $request ->title;
        $Boards->content = $request -> content;
        $Boards->reg_date = Carbon::now() ;
        $Boards-> save();
        */
        
        Boards::insert([
            'email' => $request->user()->email,
            'title' => $request->title,
            'content' => $request->content,
            'reg_date' => Carbon::now()
        ]);

        return redirect('/boards');
    }

    public function modify(Request $request)
    {   
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],            
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        User::where('id', $request->id)
        ->update(
            ['name' => $request->name,
            'password' => Hash::make($request->password),
            ]
        );

        return redirect() -> back();        
    }

    public function deleteBoards(Request $request){                

        DB::table('boards')->where('id', '=', $request->id)->delete();
        return redirect('/boards');

    }
}
