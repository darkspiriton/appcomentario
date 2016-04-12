<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Comment;

class CommentController extends Controller
{
    public function index(){

        $comments = DB::table('comments')->where('status','1')->orderBy('created_at','desc')->get();
        return response()->json(['comments' => $comments],200);
        
    }

    public function create(Request $request){
        $comment = new Comment();

    }

    public function update(){
        
    }
       

}
