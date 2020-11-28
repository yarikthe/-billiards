<?php

namespace App\Http\Controllers;

use App\Models\Forecast;
use Illuminate\Http\Request;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;

class ForecastController extends Controller
{
    public function index()
    {
        //php - ml https://sodocumentation.net/ru/php/topic/5453/%D0%BC%D0%B0%D1%88%D0%B8%D0%BD%D0%BD%D0%BE%D0%B5-%D0%BE%D0%B1%D1%83%D1%87%D0%B5%D0%BD%D0%B8%D0%B5

        // Training data
        $samples = [[60], [61], [62], [63], [65]];
        $targets = [3.1, 3.6, 3.8, 4, 4.1];

        // Initialize regression engine
        $regression = new SVR(Kernel::LINEAR);
        // Train regression engine
        $regression->train($samples, $targets);

        $a = $regression->predict([64]);  // return 4.03

        return view("forecast");
    }

}
