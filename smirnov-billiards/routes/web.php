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

// BEFORE: Route::group(['middleware' => ['web', 'auth']], function(){
Route::group(['middleware' => ['web', 'auth', 'verified']], function(){


	        //Route::prefix('organizator')->group(function () {

			

	        	Route::get('/home', function(){
	        		
	        		if(Auth::user()->role == 'org'){            

	        			return view('org');

        			}else if(Auth::user()->role == 'admin'){

        				return view('admin');
        			}else{

        				return view('user');
        			}

	        		//return view('home');
	        	
	        	});//->middleware('verified');

	        	Route::get('/sportsmens', function(){
	        		
	        		return view('sportsmen.show-all');
	        	
	        	})->middleware('verified');

	        	Route::get('/sportsmens/{id}', function(){
	        		
	        		return view('sportsmen.detail');
	        	
	        	})->middleware('verified');
			//});

	        // Super Admin
			Route::group(['prefix' => 'administrator', 'namespace' => 'Admin'], function() {
			       
			       Route::get('/', 'AdminController@index')->name('admin.index');

				   Route::get('/edit-turnir/{id}', 'AdminController@editTurnir')->name('admin.edit-turnir');
				   Route::get('/delete-turnir/{id}', 'AdminController@deleteTurnir')->name('admin.delete-turnir');

				   Route::get('/edit-player/{id}', 'AdminController@editPlayer')->name('admin.edit-player');
				   Route::get('/delete-player/{id}', 'AdminController@deletePlayer')->name('admin.delete-player');			       
			});

			// User 
			Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
			   		
			   		Route::get('/', 'UserController@index')->name('user.index');  

			   		Route::get('/live-turnir', 'UserController@liveTurnit')->name('user.live-turnir');  
			   		Route::get('/old-turnir', 'UserController@oldTurnir')->name('user.old-turnir');    

			   		Route::get('/forecast-turnir', 'UserController@forecast')->name('user.forecast');  
			});

			// Admin - Oraganizator turniry
			Route::group(['prefix' => 'organizator', 'namespace' => 'Organizator'], function() {
			        
			        Route::get('/{id}', 'OrganizatorController@index')->name('organizator.index');

			        Route::get('/create-turnir', 'OrganizatorController@createTurnir')->name('organizator.create-turnir');// Create turnir
			        Route::get('/new-player', 'OrganizatorController@newPlayer')->name('organizator.new-player');// Create player
			        
			        // Route::get('edit/{id}', 'OrganizatorController@edit')->name('organizator.edit');
			        // Route::delete('delete/{id}', 'OrganizatorController@destroy')->name('organizator.delete');
			});
	    
        	// https://webdevetc.com/programming-tricks/laravel/laravel-routes/how-to-namespace-a-laravel-route-group/

});

// 
// Example
// 
// Route::group(['prefix' => 'user', 'namespace' => 'Admin'], function() {
//         Route::get('/', 'UserController@index')->name('user.index');
//         Route::get('create', 'UserController@create')->name('user.create');
//         Route::post('store', 'UserController@store')->name('user.store');
//         Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
//         Route::put('update/{id}', 'UserController@update')->name('user.update');
//         Route::delete('delete/{id}', 'UserController@destroy')->name('user.delete');
// });