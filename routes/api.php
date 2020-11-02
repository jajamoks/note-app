<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->group(function () {
    Route::get('/notes', 'NotesController@index');
    Route::post('/notes', 'NotesController@store');
    Route::get('/notes/{note}', 'NotesController@show');
    Route::patch('/notes/{note}', 'NotesController@update');
    Route::delete('/notes/{note}', 'NotesController@destroy');
    Route::get('activities/last60minutes', 'ActivityController@last60Minutes');
});

