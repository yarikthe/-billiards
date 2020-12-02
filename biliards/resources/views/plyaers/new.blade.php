@extends('layouts.org')
@section('content')
@if ( Auth::user() and Auth::user()->role == "org")

<div class="contaoner col-md-8">
<form method="POST" action="/organizator/player/insert/" enctype="multipart/form-data">
						  @csrf  
						  <h5>Нова гравець</h5><hr>
						  <div class="form-group"><label>Фотографія</label>
                            
						    	 <img id="preview" src="https://lh3.googleusercontent.com/proxy/DxYP3onCuWC3_YaAlvdJH06Peaf-a-4fLLl_hf4aDJlhzvrItVnEtV2zHKwpGPm4FG4XzYlsj9F07fC2CIQBYEQTOjzDLub2MCjtuPTfhfoJeg" class="card-img-top w-50"> 
								 <br> <br>
						    	 <input type="file" name="img" onchange="readURL(this);" required>
                                 
						  </div>
						  <div class="form-group"><label>ПІБ</label>
						  	
						    	<input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="ПІБ" required>
						  	
						  </div>
                          <div class="form-group"><label>Дата народження</label>
                          <input type="date" id="dateBorn" name="dateBorn" class="form-control" value="">
                          </div>
                          <div class="form-group"><label>Звання спортивне</label>
							  
						  		<select name="sportTitul" id="sportTitul" class="form-control">

								  <option value="Master">Майстер</option>
								  <option value="Pro">Професіонал</option>
								  <option value="New">Новачок</option>
								  <option value="Midl">Середній рівень</option>

								</select>
						    
						  </div>
                          <div class="form-group"><label>Місто</label>
						  	
						    	<input type="text" name="city" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Місто" required>
						  	
						  </div>

                          <div class="form-group"><label>Почткові очки</label>
                          
                                <input type="number" id="countPointStart" class="form-control"  name="countPointStart" min="100" max="1000">
                          </div>

                           <div class="form-group"><label>К-ть перемог</label>
                          
                                <input type="number" id="countWin" class="form-control"  name="countWin" min="1" max="1000" step="1">
                          </div>

                           <div class="form-group"><label>К-ть програшів</label>
                          
                                <input type="number" id="countLoss" class="form-control"  name="countLoss" min="1" max="1000" step="1">
                          </div>
						 

						  <button type="submit" class="btn btn-success">Додати</button>
			</form>
            <script type="text/javascript">
					  	 function readURL(input) {
				            if (input.files && input.files[0]) {
				                var reader = new FileReader();

				                reader.onload = function (e) {
				                    $('#preview')
				                        .attr('src', e.target.result);
				                };

				                reader.readAsDataURL(input.files[0]);
				            }
				        }
					  </script>
</div>
@else
  <div class="container">
    <h1>У вас немає доступу до сторінки</h1>
  </div>
@endif
@endsection