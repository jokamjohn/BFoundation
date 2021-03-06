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
    Route::get('email/verification',['as'=> 'employer.verify.email', 'uses' =>'AuthController@verify']);
    Route::get('/logout','AuthController@logout');
    //Dashboard
    Route::get('/dashboard', ['as' => 'employer.dashboard', 'uses' => 'DashboardController@index']);

    Route::get('/', 'DashboardController@index');

    //Jobs
    Route::resource('/job','JobController');

    //Trainings
    Route::resource('/training', 'TrainingController');


});

Route::group([ "namespace" => "Frontend", 'prefix' => 'youth'], function (){
    Route::get('/job/opportunities', ['as' => 'youth.jobs.index', 'uses' => 'FrontendController@jobs']);
    Route::get('/job/opportunities/{slug}', ['as' => 'youth.job.show', 'uses' => 'FrontendController@job']);

    Route::get('/training/opportunities', ['as' => 'youth.trainings.index', 'uses' => 'FrontendController@trainings']);
    Route::get('/training/opportunities/{slug}', ['as' => 'youth.training.show', 'uses' => 'FrontendController@training']);
});

Route::group(['namespace' => 'Backend\\Youth', 'prefix' => 'youth'], function (){
   Route::resource('/profile','ProfileController', ['only' => ['show', 'edit', 'update']]);
});

Route::group(['namespace' => 'Auth'], function (){
    Route::get('/logout', 'LoginController@logout');
    Route::get('auth/email/verification/{token}',['as'=> 'auth.youth.verify.email', 'uses' =>'RegisterController@confirmEmail']);
    Route::get('email/verification',['as'=> 'verify.email', 'uses' =>'RegisterController@verify']);

});

Auth::routes();

Route::get('/home', 'HomeController@index');//delete
