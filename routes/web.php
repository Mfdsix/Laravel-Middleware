<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'is.auth'], function(){
	Route::get('/must-auth', function(){
		session()->put('visit', true);
		echo "must auth page";
	});

	Route::group(['middleware' => 'is.visit'], function(){
		Route::get('/must-visit', function(){
			echo "must visit page";
		});
	});
});

