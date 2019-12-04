<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class MypageController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
        $myData = User::all();
        return view('mypage',compact('myData'));    
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
}
