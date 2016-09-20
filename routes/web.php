<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["namespace" => "Backend\\Employer", 'prefix' => 'employer'], function (){
    //Employer Auth
    Route::get('/login',['as' => 'auth.employer.login', 'uses' => 'AuthController@login']);
    Route::post('/login',['as' => 'auth.employer.post.login', 'uses' => 'AuthController@postLogin']);
    Route::get('/register',['as' => 'auth.employer.register', 'uses' => 'AuthController@register']);
    Route::post('/register',['as' => 'auth.employer.post.register', 'uses' => 'AuthController@postRegister']);
    Route::get('auth/email/verification/{token}',['as'=> 'auth.employer.verify.email', 'uses' =>'AuthController@confirmEmail']);

    //Dashboard
    Route::get('/dashboard', ['as' => 'employer.dashboard', 'uses' => 'DashboardController@index']);

    //Jobs
    Route::resource('/job','JobController');


});

Route::group(['namespace' => 'Auth'], function (){
    Route::get('/logout', 'LoginController@logout');
});

Auth::routes();

Route::get('/home', 'HomeController@index');//delete
