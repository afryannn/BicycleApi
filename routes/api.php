<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

//fix
Route::post('/login','ApiController@postLogin');
Route::post('/register','ApiController@postRegister');
Route::post('/booking','ApiController@bookingitem');
Route::get('/getcustomer','ApiController@getcustomer');
Route::post('/deletecustomer','ApiController@deletecustomer');
Route::get('/getitem','ApiController@getitem');
Route::post('/postsepeda','ApiController@postsepeda');
Route::post('/deleteitem','ApiController@deleteitem');
Route::get('/image/{filename}','ApiController@getimage');
Route::post('/customerupdate','ApiController@customerupdate');
Route::post('/user-booking','ApiController@userbooking2');
Route::post('/image','ApiController@dummyimage');

