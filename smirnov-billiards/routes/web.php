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

Route::get('/', function () { return view('welcome'); });
Route::get('/turnirs', function () { return view('turnirs.index'); });
Route::get('/about', function () { return view('public.about'); });
Route::get('/error', function () { return view('public.error'); });
Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('public/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['web', 'auth', 'verified']], function(){

	        	Route::get('/home', function(){
	        		
	        		if(Auth::user()->role == 'org'){            

	        			return view('org');

        			}else if(Auth::user()->role == 'admin'){

        				return view('admin');
        			}else{

        				return view('user');
        			}
	        	
	        	});//->middleware('verified');


	        // Super Admin
			Route::group(['prefix' => 'administrator', 'namespace' => 'Admin'], function() {
			       
			    //    Route::get('/', 'AdminController@index')->name('admin.index');			       
			});

			// User 
			Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
			   		
			   		// Route::get('/', 'UserController@index')->name('user.index');  
			});

			// Admin - Oraganizator turniry
			Route::group(['prefix' => 'organizator', 'namespace' => 'Organizator'], function() {

				// Player 
				Route::get('/players', 'PlayerController@index');
				Route::get('/new-player', 'PlayerController@new');
				Route::post('/player/insert/', 'PlayerController@insert');
				Route::get('/player/view/{id}', 'PlayerController@show')->name('player.show');
				Route::get('/player/edit/{id}', 'PlayerController@edit')->name('player.edit');
				Route::post('/player/update/{id}', 'PlayerController@update')->name('player.update');
				Route::get('/player/destroy/{id}', 'PlayerController@destroy')->name('player.destroy');
				

				//Turnir
				Route::get('/turnirs', 'TurnirController@index');
				Route::get('/turnir/create-new', 'TurnirController@new');
				Route::post('/turnir/insert', 'TurnirController@insert');
			
			});
        
});
