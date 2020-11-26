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

use App\Turnir;
use App\Player;
use App\Claim;

Route::get('/', function () { 

	$players = Player::all();
	$turnir = Turnir::where("isDone", 0)->get();

	$turnirold = Turnir::where("isDone", 1)->get();

	return view('welcome', compact("players", "turnir", "turnirold")); 
});
Route::get('/turnir/show/{id}', 'HomeController@showTurnir')->name('t.show');
Route::get('/player/show/{id}', 'HomeController@showPlayer')->name('p.show');

Route::get('/go-to-previous-page', function () { return Redirect::back(); });
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

Route::get('/statisctics', function () { return view('statistics'); });
Route::get('/prediction', function () { return view('prediction'); });
Route::get('/stavka', function () { return view('stavka'); }); 
Route::get('users', 'UserChartController@index');
Auth::routes(['verify' => true]);

Route::group(['middleware' => ['web', 'auth', 'verified']], function(){

	        	Route::get('/home', function(){
	        		
	        		if(Auth::user()->role == 'org'){            

						$turnirs = Turnir::where('organizator_id', Auth::user()->id)->get();

	        			return view('org', compact("turnirs"));

        			}else if(Auth::user()->role == 'admin'){

        				return view('admin');
        			}else{
						
						$claim = Claim::where("user_id", Auth::user()->id)->first();

        				return view('user', compact("claim"));
        			}
	        	
	        	});//->middleware('verified');


	        // Super Admin
			Route::group(['prefix' => 'administrator', 'namespace' => 'Admin'], function() {
			       
				//    Route::get('/', 'AdminController@index')->name('admin.index');	
				// edit users, turnir, player		       
			});

			// User 
			Route::group(['prefix' => 'user', 'namespace' => 'User'], function() {
			   		
				Route::post('/want-be-org', 'UserController@org');
				Route::post('/delete/{id}', 'UserController@delete')->name("user.delete");

				Route::get('/turnirs', 'UserController@turnirs');
				Route::get('/players', 'UserController@sportman');
				Route::get('/forecast', 'UserController@forecast');
				Route::get('/stavka', 'UserController@stavka');
				Route::get('/profile/{id}', 'UserController@profile')->name('user.profile');
				Route::get('/turnir/{id}', 'UserController@turnir')->name('user.turnir');

				Route::post('/stavka-insert', 'UserController@newstavka');
				Route::post('user/balance/import/{id}', 'UserController@importBalance');
				Route::get('/stavka/delete/{id}', 'UserController@deleteStavka')->name('stavka.delete');

				Route::get('/raund/get/{id}', 'UserController@getRaund');
				Route::get('/player/get/{id}', 'UserController@getPlayer');
			});

			// Admin - Oraganizator turniry
			Route::group(['prefix' => 'organizator', 'namespace' => 'Organizator'], function() {

				// Player 
				Route::get('/players', 'PlayerController@index');
				Route::get('/new-player', 'PlayerController@new');
				Route::post('/player/insert/', 'PlayerController@insert');
				Route::get('/player/show/{id}', 'PlayerController@show')->name('player.show');
				Route::get('/player/edit/{id}', 'PlayerController@edit')->name('player.edit');
				Route::post('/player/update/{id}', 'PlayerController@update')->name('player.update');
				Route::get('/player/destroy/{id}', 'PlayerController@destroy')->name('player.destroy');
				

				//Turnir
				Route::get('/turnirs', 'TurnirController@index');
				Route::get('/turnir/create-new', 'TurnirController@new');
				Route::post('/turnir/insert', 'TurnirController@insert');
				Route::get('/turnir/close/{id}', 'TurnirController@close')->name('turnir.close');
				Route::get('/turnir/delete/{id}', 'TurnirController@delete')->name('turnir.delete');
				Route::get('/turnir/cancel/{id}', 'TurnirController@cancel')->name('turnir.cancel');
				Route::get('/turnir/public/{id}', 'TurnirController@public')->name('turnir.public');
				Route::get('/turnir/hidden/{id}', 'TurnirController@hidden')->name('turnir.hidden');
				Route::get('/turnir/show/{id}', 'TurnirController@show')->name('turnir.show');
				Route::get('/turnir/edit/{id}', 'TurnirController@edit')->name('turnir.edit');
				Route::get('/turnir/remove/player/{id}', 'TurnirController@remove')->name('turnir.remove');
				Route::post('/turnir/update/{id}', 'TurnirController@update')->name('turnir.update');
				Route::post('/turnir/insert-players', 'TurnirController@playeradd');

				Route::post('/turnir/raund/insert', 'TurnirController@insertRaund');
				Route::get('/turnir/raund/delete/{id}', 'TurnirController@deleteRaund')->name('turnir.delete-raund');
				Route::get('/turnir/raund/win/{id}', 'TurnirController@showwin')->name('turnir.showwin');
				Route::post('/turnir/raund/win/accept/{id}', 'TurnirController@winRaund')->name('turnir.win-raund');

				Route::get('/turnir/table/{id}', 'TurnirController@table')->name('turnir.table');
			});
        
});

Route::get('csrf-ajax', function()
{
    if (Session::token() != Request::header('x-csrf-token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});
