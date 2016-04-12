<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function index(){
        $usersR= new User();
        $usersO = new User();
        
        return response()->json(['cantO'=>$usersO,
                                 'cantR'=>$usersR],200);        
    }
    
    private function createUserO($num){
        
    }
    
    private function deleteUserO($num){
        
    }
    
    private function createUSerR($num){
        
    }
}
