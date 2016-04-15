<?php

namespace App\Http\Controllers;

use App\User;

use App\Http\Requests;

class UserController extends Controller
{
    public function index(){
        header("Access-Control-Allow-Origin: http://dev.nosvenden.com");
        $user= User::find(1);
        $this->actualizarUserO();
        $this->createUSerR();

        return response()->json(['cantO'=>$user->cantO,
                                 'cantR'=>$user->cantR],200);
    }

    private function actualizarUserO(){
      
        $user= User::find(1);
        $n = rand(0,3);

        if($n == 2){
            $user->cantO = $user->cantO + $n;
            $user->save();
        }elseif($n < 2){
            $user->cantO = $user->cantO - 1;
            $user->save();
        }
    }


    private function createUSerR(){
        $user= User::find(1);
        $n = rand(0,5);

        if($n == 1){
            $user->cantR = $user->cantR + $n;
            $user->save();
        }
    }
}
