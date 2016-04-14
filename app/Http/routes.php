<?php

Route::group(['prefix'=>'api','middleware'=>['web']], function(){
    //Mostrar Comentarios
    Route::resource('comment','CommentController',
                    ['only' => ['index','create','update','destroy','store','show']]);
    
    //Devuelve Cantidad de Usuarios
    Route::resource('user','UserController',
                    ['only' => ['index']]);

    Route::route('admin/comment','CommentController@admin');

});