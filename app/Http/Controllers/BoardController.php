<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Board;

class Boardcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){

        $board = Board::all();
        return response()->json($board);
    }

    public function store (Request $request){

        Board::create([
            'name' => $request->name,
             'user_id' => $request->user_id,
        ]);

        return response()->json( ['message'=>'succes'],200);
    }

    public function show ($id){
       $board =  Board::findOrFail($id);
        return $board;
    }

    //
}
