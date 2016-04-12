<?php

Route::group(['prefix'=>'api'], function(){
    //Mostrar Comentarios
    Route::resource('comment','CommentController',
                    ['only' => ['index','create','update','destroy']]);

    //Devuelve Cantidad de Usuarios
    Route::resource('user','UserController',
                    ['only' => ['index']]);

});
