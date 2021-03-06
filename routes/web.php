<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();


Route::middleware('auth:api')->get('/user', function (Request $request) {

   return $request->user();

});

Route::post('login', 'Api\ApiController@login');

Route::post('register', 'Api\ApiController@register');

Route::group(['middleware' => 'auth:api'], function(){

Route::get('get-details', 'Api\ApiController@getDetails');

});





Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {

  Route::get('/dashboard', function () {
      return view('admin.dashboard');
  });

  Route::get('/role-register', 'Admin\DashboardController@registered');
  Route::get('/role-edit/{id}', 'Admin\DashboardController@registeredit');
  Route::put('/role-register-update/{id}','Admin\DashboardController@registerupdate');
  Route::delete('/role-delete/{id}', 'Admin\DashboardController@registerdelete');

  Route::get('/createuser', 'Admin\DashboardController@createuser');
Route::post('/save-newuser', 'Admin\DashboardController@store');

});
