<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login','ApiController@postLogin');
Route::post('/register','ApiController@postRegister');\
Route::post('/booking','ApiController@bookingitem');
Route::get('/getcustomer','ApiController@getcustomer');

//Admin
Route::post('/postsepeda','ApiController@postsepeda');
Route::post('/deleteitem/{id}','ApiController@destroyitem');


Route::get('/getsepeda','ApiController@getdatasepedaall')->name('p');

