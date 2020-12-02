<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Import library
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Classification\KNearestNeighbors;
        
class CorecastController //extends Controller
{
    public function index()
    {

        // // Training data
        // $samples = [[60], [61], [62], [63], [65]];
        // $targets = [3.1, 3.6, 3.8, 4, 4.1];

        // // Initialize regression engine
        // $regression = new SVR(Kernel::LINEAR);
        // // Train regression engine
        // $regression->train($samples, $targets);
        
        // $res = "re";
        // $regression->predict([64]);  // return 4.03

        // https://recordnotfound.com/php-ml-php-ai-133679
$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
$labels = ['a', 'a', 'a', 'b', 'b', 'b'];

$classifier = new KNearestNeighbors();
$classifier->train($samples, $labels);

$res = $classifier->predict([13, 22]);
// return 'b'
        return view("forecast", compact("res"));
    }
}


// https://dev.to/kingsconsult/laravel-8-auth-registration-and-login-32jl