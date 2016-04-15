<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS, HEAD");
header("Content-Type: application/json");

Route::group(['prefix'=>'api','middleware'=>['web']], function(){
    //Mostrar Comentarios
    Route::resource('comment','CommentController',
                    ['only' => ['index','create','update','destroy','store','show']]);

    //Devuelve Cantidad de Usuarios
    Route::resource('user','UserController',
                    ['only' => ['index']]);

    Route::get('admin/comment','CommentController@admin');

});
