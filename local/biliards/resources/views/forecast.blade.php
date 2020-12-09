@extends('layouts.app')

@section('content')
<div class="container text-left shadow rounded-top mt-5 pt-5">
	@if(Auth::user())
	<a href="/home">Назад</a>
	@else
	<a href="/">Назад</a>
	@endif
	
    <h1>
        Прогнозування
    </h1>
    <p>
    	Прогнозування ймовірності виграшу гравця
    </p>
    <hr>
    <div class="content">
		<div class="col-md-12"> 
				{!! $line_chart->html() !!}<hr>
		</div>
    	Таблиця прогнозування ймовірності виграшу гравця: 
	    <hr>
	    <div class="d-flex justify-content-between  bg-info text-white shadow-lg rounde-lg m-2 p-2">
				    	
				    	<div class="name col-md-3">
				    		Імя
				    	</div>

				    	<div class="count-win col-md-3">
				    		Перемоги
				    	</div>

				    	<div class="count-loss col-md-3">
				    		Поразки
				    	</div>

				    	<div class="predict-result col-md-3">				    		
				    		Ймовірність виграшу
				    	</div>

		</div>
	    @foreach($players as $key => $value)
	     	
	     		
				    <div class="d-flex justify-content-between  bg-light shadow-lg rounde-lg m-2 p-2">
				    	
				    	<div class="name col-md-3">
				    		{{
					    		$value->name
					    	}}
				    	</div>

				    	<div class="count-win col-md-3">
				    		{{
					    		$value->countWin
					    	}}
				    	</div>

				    	<div class="count-loss col-md-3">
				    		{{
					    		$value->countLoss
					    	}}
				    	</div>

				    	<div class="predict-result col-md-3">				    		
				    		 @for($i = 0; $i < $players->count(); $i++)
				    		 	
				    		 	@if($value->id == $resultPredictPlayerWin[$i][0])

				    		 	<div class="justify-content-between p-2">
				    		 		
									Виграш:  
									   {{
									   	$resultPredictPlayerWin[$i][1]
									   }}
									%
				    		 	</div>		
				    		 	
				    		 	@endif

				    		 @endfor
				    	</div>

				    </div>
			
	    
	    @endforeach
    </div>
	
	{!! Charts::scripts() !!}
 
    {!! $line_chart->script() !!}

    <hr>
</div>
@endsection