<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LaravelTest;

class LaravelTestController extends Controller
{
    public function create(){
        return view('laravelTest.create');
    }

    public function store(Request $request){

        //dd($request->url());
        //return $request->all();
        
        /*
        $laravelTest = new LaravelTest;
        $laravelTest->user_id = $request->user()->id;
        $laravelTest->title = $request ->title;
        $laravelTest->description = $request -> description;
        $laravelTest-> save();
        */

        LaravelTest::create([
            'user_id' => $request->user() ->id,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect() ->back();
    }


}
