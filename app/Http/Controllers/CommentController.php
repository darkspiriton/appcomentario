<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Comment;
use ErrorException;
use Psy\Exception\FatalErrorException;

class CommentController extends Controller
{
    
    public function index(){
        $comments = DB::table('comments')->where('status','1')->orderBy('created_at','desc')->paginate(10);
        return response()->json(['comments' => $comments],200);
    }

    public function admin(){     
        header("Content-Type: application/json");        
        $comments = DB::table('comments')->orderBy('created_at','desc')->get();
        return response()->json(['comments' => $comments],200);
    }


    public function create(Request $request){
        header("Access-Control-Allow-Origin: *");
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
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: PUT");
        header("Access-Control-Allow-Headers: Content-Type");
        try{

            $comment = Comment::find($id);
            if ($comment !== null) {
                $comment->status=1;
                $comment->save();
                return response()->json(['message' => 'Se actualizo correctamente'],200);
            }
            return \Response::json(['message' => 'No existe ese comentario'], 404);

        }catch (ErrorException $e){
            return \Response::json(['message' => 'Ocurrio un error'], 500);
        }


    }

    public function destroy($id){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: DELETE");
        header("Access-Control-Allow-Headers: Content-Type");
        try{
            $comment = Comment::find($id);
            if ($comment !== null){
                $comment->delete();
                return response()->json(['message' => 'Se elimino correctamente el comentario'],200);
            }
            //$comment->save();
            return \Response::json(['message' => 'No existe ese comentario'], 404);
        }catch (ErrorException $e){
            return \Response::json(['message' => 'Ocurrio un error'], 500);
        }

        
    }
       

}
