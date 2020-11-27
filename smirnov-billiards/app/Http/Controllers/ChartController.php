<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Charts;
use DB;
use Auth;
use App\Player;
use App\Turnir;
use App\Claim;
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


// 		$data_komnata = array();
// 		$data_student = array();

// 		$komnata = Komnata::all();

//         foreach($komnata as $key => $value){

//         	$data_komnata[] = $value->numberName;
//         	$data_student[] = $value->zanyatoPlace;
//         }


// 		$line_chart = Charts::create('line', 'highcharts')
// 			    ->title('К-ть студентів, що проживають у кімнатах')
// 			    ->elementLabel('К-ть осіб')
// 			    ->labels($data_komnata)
// 			    ->values($data_student)
// 			    ->dimensions(1000,500)
// 			    ->responsive(true);
 

// ////////////////////////////////////////////////////////////////////////////////////////////////////////// 


// 		$countMan = Student::where("sex", "man")->get();
// 		$countWooman = Student::where("sex", "woman")->get();

// 		$donut_chart = Charts::create('donut', 'highcharts')
// 			    ->title('Аналіз студентів за статтю')
// 			    ->labels(['Чоловіки', 'Жінки'])
// 			    ->values([$countMan->count(), $countWooman->count()])
// 			    ->dimensions(1000,500)
// 			    ->responsive(true);


// //////////////////////////////////////////////////////////////////////////////////////////////////////////      

// 		$data_man = array();
// 		$data_woman = array();

// 		foreach($komnata as $key => $value){

//         	$data_man[] = $value->countMan;
//         	$data_woman[] = $value->countWooman;
//         }


// 		$areaspline_chart = Charts::multi('areaspline', 'highcharts')
// 				    ->title('Аналіз к-ть студентів в кімнатах за статтю')
// 				    ->colors(['#6685E5','#E57C66'])
// 				    ->labels($data_komnata)
// 				    ->dataset('Чоловіки', $data_man)
// 				    ->dataset('Жінки',  $data_woman);


////////////////////////////////////////////////////////////////////////////////////////////////////////// 

        // return view('charts',compact('pie_chart','line_chart','donut_chart', 'areaspline_chart'));
        return view('charts',compact('pie_chart'));
	}

}