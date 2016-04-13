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
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Access-Control-Request-Headers: api-key");
        $comments = DB::table('comments')->where('status','1')->orderBy('created_at','desc')->paginate(10);
        return response()->json(['comments' => $comments],200);
    }

    public function create(Request $request){
        header("Access-Control-Allow-Origin: http://dev.nosvenden.com");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Headers: Content-Type");

        if (!is_array($request->all())) {
            return response()->json(['message' => 'request must be an array'],401);
        }
        // Creamos las reglas de validación
        $rules = [
            'name'      => 'required',
            'email'     => 'required|email',
            'comment'  => 'required',
            'stars'  => 'required'
        ];

        try {
            // Ejecutamos el validador y en caso de que falle devolvemos la respuesta
            // con los errores
            $validator = \Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['message' => 'No posee todo los campos necesario para crear un usuario'],401);
            }
            // Si el validador pasa, almacenamos el comentario
            $comment = new Comment();
            $comment->name= $request->input('name');
            $comment->email= $request->input('email');
            $comment->comment= $request->input('comment');
            $comment->stars= $request->input('stars');
            $comment->status = 0;
            $comment->save();
            return response()->json(['message' => 'Se agrego correctamente'],200);
        } catch (Exception $e) {
            // Si algo sale mal devolvemos un error.
            return \Response::json(['message' => 'Ocurrio un erro al crear el comentario'], 500);
        }
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

    public function select(){

    }
       

}
