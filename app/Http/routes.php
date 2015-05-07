<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::get('/',function(){

    return redirect()->to('testt');

//    return storage_path().'<br>'.base_path().'/public';
});
Route::get('testt',function(){

            return view('test')->with('message','hello everything is ok  !!!!!!');

//    return storage_path().'<br>'.base_path().'/public';
});
get('upload',function(){
    return view('upload');
});

post('apply/multiple_upload','ApplyController@multiple_upload');

get('error', function(){
    throw new \Exception;
});

