<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use DB;
use Auth;
use App\Player;
use App\Turnir;
use App\Claim;
use App\Models\SetPlayer;
use App\SetPleyer;
use App\Raund;
use App\PR;
use App\User;
use App\Stavka;

class ChartController extends Controller
{
    public function index()
    {
////////////////////////////////////////////////////////////////////////////////////////////////////////// 


		$countLive1 = User::where("role", "user")->get();
		$countLive2 = User::where("role", "org")->get();
		$all = User::all();

		$pie_chart = Charts::create('pie', 'highcharts')
				->title('Типи користувачів - ' .$all->count() )
				->labels(['Користувачі', 'Організатори'])
				->values([$countLive1->count(), $countLive2->count()])
				->dimensions(1000,500)
				->responsive(true);


// ////////////////////////////////////////////////////////////////////////////////////////////////////////// 


 		$data_turnir = array();
 		$data_countPlayer = array();

		$turnir = Turnir::all();

         foreach($turnir as $key => $value){

			$data_turnir[] = $value->name;

			$data_countPlayer[] = SetPlayer::where("turnir_id", $value->id)->count();
         }


 		$line_chart = Charts::create('line', 'highcharts')
			    ->title('К-ть гравців, що приймауть участь у турнірі')
 			    ->elementLabel('К-ть осіб')
 			    ->labels($data_turnir)
 			    ->values($data_countPlayer)
 			    ->dimensions(1000,500)
 			    ->responsive(true);
 

// ////////////////////////////////////////////////////////////////////////////////////////////////////////// 


 		$countPro = Player::where("sportTitul", "Pro")->get();
		$countMidl = Player::where("sportTitul", "Midl")->get();
		$countNew = Player::where("sportTitul", "New")->get();
		$countMaster = Player::where("sportTitul", "Master")->get();

 		$donut_chart = Charts::create('donut', 'highcharts')
 			    ->title('Аналіз гравців за статтю')
 			    ->labels(['Професіонал', 'Середні рівень', 'Новачок', 'Майстер'])
 			    ->values([$countPro->count(), $countMidl->count(), $countNew->count(),  $countMaster->count()])
 			    ->dimensions(1000,500)
 			    ->responsive(true);


// //////////////////////////////////////////////////////////////////////////////////////////////////////////      

		$data_win = array();
		$data_loss = array();
		$data_name = array();

		$players = Player::all();

		foreach($players as $key => $value){

        	$data_win[] = $value->countWin;
			$data_loss[] = $value->countLoss;
			$data_name[] = $value->name;
        }


		$areaspline_chart = Charts::multi('areaspline', 'highcharts')
				    ->title('Аналіз к-ть перемог та поразок гравця')
				    ->colors(['#6685E5','#E57C66'])
				    ->labels($data_name)
				    ->dataset('Перемоги', $data_win)
				    ->dataset('Поразки',  $data_loss);


////////////////////////////////////////////////////////////////////////////////////////////////////////// 

        return view('statistics',compact('pie_chart', 'areaspline_chart', 'line_chart', 'donut_chart'));
	}

}