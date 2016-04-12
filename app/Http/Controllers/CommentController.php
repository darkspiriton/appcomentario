<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Comment;

class CommentController extends Controller
{
    public function index(){
        header("Access-Control-Allow-Origin: http://dev.nosvenden.com");
        $comments = DB::table('comments')->where('status','1')->orderBy('created_at','desc')->get();
        return response()->json(['comments' => $comments],200);
        
    }

    public function create(Request $request){
        header("Access-Control-Allow-Origin: http://dev.nosvenden.com");
        header("Access-Control-Allow-Methods: GET");
        header("ccess-Control-Allow-Headers: Content-Type");

        $comment = new Comment();
        $comment->name= $request->input('name');
        $comment->email= $request->input('email');
        $comment->comment= $request->input('comment');
        $comment->stars= $request->input('stars');
        $comment->status = 0;
        $comment->save();

        return response()->json(['message' => 'Se agrego correctamente'],200);

    }

    public function update($id){        
        $comment = Comment::find($id);
        $comment->status=1;
        $comment->save();
    }

    public function destroy($id){
        $comment = Comment::find($id);
        $comment->delete();
    }
       

}
