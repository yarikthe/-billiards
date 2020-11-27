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
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use App\Notifications\ArticlePublished;

Auth::routes(['verify' => true]);

Route::get('/', function () { 

	$players = Player::all();
	$turnir = Turnir::where("isDone", 0)->where("isPiblic",1)->get();

	$turnirold = Turnir::where("isDone", 1)->where("isPiblic", 1)->get();

	return view('welcome', compact("players", "turnir", "turnirold")); 
});

Route::get('/statistics', 'ChartController@index')->name('chart.index');

Route::get('/about', 'PublicController@about');
Route::get('/contact','PublicController@contact');
Route::get('/error', 'PublicController@error');


Route::get('/public/turnir/show/{id}', 'PublicController@showTurnir')->name('t.show');
Route::get('/public/player/show/{id}', 'PublicController@showPlayer')->name('public.show');
Route::get('/public/turnir/table/{id}', 'PublicController@table')->name('public.table');

Route::group(['middleware' => ['web', 'auth']], function(){

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


	
        
});

        // Super Admin
		Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function() {
				
			Route::get('/forecast', 'AdminController@forecast');
			Route::get('/statistics', 'AdminController@stat');

			Route::get('/users', 'AdminController@users');	
			Route::get('/confirm-org/{id}', 'AdminController@conformUserToOrg');	
			Route::get('/users/delete/{id}', 'AdminController@usersDelete');

			Route::get('/players', 'AdminController@players');
			Route::get('/turnirs', 'AdminController@turnirs');

			Route::get('/player/show/{id}', 'AdminController@show')->name('admin.show');
			Route::get('/player/edit/{id}', 'AdminController@edit')->name('admin.edit');
			Route::post('/player/update/{id}', 'AdminController@update')->name('admin.update');
			Route::get('/player/destroy/{id}', 'AdminController@destroy')->name('admin.destroy');

			Route::get('/turnirs', 'AdminController@indexturnirs');
			Route::get('/turnir/create-new', 'AdminController@newturnirs');
			Route::post('/turnir/insert', 'AdminController@insertturnirs');
			Route::get('/turnir/close/{id}', 'AdminController@closeturnirs')->name('adminturnir.close');
			Route::get('/turnir/delete/{id}', 'AdminController@deleteturnirs')->name('adminturnir.delete');
			Route::get('/turnir/cancel/{id}', 'AdminController@cancelturnirs')->name('adminturnir.cancel');
			Route::get('/turnir/public/{id}', 'AdminController@publicturnirs')->name('adminturnir.public');
			Route::get('/turnir/hidden/{id}', 'AdminController@hiddenturnirs')->name('adminturnir.hidden');
			Route::get('/turnir/show/{id}', 'AdminController@showturnirs')->name('adminturnir.show');
			Route::get('/turnir/edit/{id}', 'AdminController@editturnirs')->name('adminturnir.edit');
			Route::get('/turnir/remove/player/{id}', 'AdminController@removeturnirs')->name('adminturnir.remove');
			Route::post('/turnir/update/{id}', 'AdminController@updateturnirs')->name('adminturnir.update');
			Route::post('/turnir/insert-players', 'AdminController@playeraddturnirs');

			Route::post('/turnir/raund/insert', 'AdminController@insertRaundturnirs');
			Route::get('/turnir/raund/delete/{id}', 'AdminController@deleteRaundturnirs')->name('adminturnir.delete-raund');
			Route::get('/turnir/raund/win/{id}', 'AdminController@showwinturnirs')->name('adminturnir.showwin');
			Route::post('/turnir/raund/win/accept/{id}', 'AdminController@winRaundturnirs')->name('adminturnir.win-raund');

			Route::get('/turnir/table/{id}', 'AdminController@tableturnirs')->name('adminturnir.table');
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

Route::get('csrf-ajax', function()
{
    if (Session::token() != Request::header('x-csrf-token'))
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

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