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

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['web', 'auth']], function(){

		
	      Route::prefix('admin')->group(function () {

	        	Route::get('/dashboard', function(){
	        		
	        		return view('home');
	        	
	        	})->middleware('verified');
			});

	   
	    	Route::prefix('user')->group(function () {

	        	Route::get('/accaunt', function(){
	        		
	        		return view('home');
	        	
	        	})->middleware('verified');
			});
	  

	        Route::prefix('organizator')->group(function () {

	        	Route::get('/home', function(){
	        		
	        		return view('home');
	        	
	        	})->middleware('verified');
			});
	    
        

});

// Route::group(['prefix' => 'user', 'namespace' => 'Admin'], function() {
//         Route::get('/', 'UserController@index')->name('user.index');
//         Route::get('create', 'UserController@create')->name('user.create');
//         Route::post('store', 'UserController@store')->name('user.store');
//         Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
//         Route::put('update/{id}', 'UserController@update')->name('user.update');
//         Route::delete('delete/{id}', 'UserController@destroy')->name('user.delete');
// });