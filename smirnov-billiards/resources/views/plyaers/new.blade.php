@extends('layouts.org')
@section('content')

<div class="contaoner col-md-8">
<form method="POST" action="/organizator/player-new/insert" enctype="multipart/form-data">
						  @csrf  
						  <h5>Нова гравець</h5><hr>
						  <div class="form-group"><label>Фотографія</label>
                                <br>
						    	 <input type="file" name="img" onchange="readURL(this);" required>
                                 <br>
						    	 <img id="preview" src="{{ asset('uploads/category/default.png') }}" class="card-img-top w-50"> 
						  	
						  </div>
						  <div class="form-group"><label>ПІБ</label>
						  	
						    	<input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="ПІБ" required>
						  	
						  </div>
                          <div class="form-group"><label>Дата народження</label>
                          <input type="date" id="dateBorn" name="dateBorn" class="form-control" value="">
                          </div>
                          <div class="form-group"><label>Звання спортивне</label>
						  	
						    	<input type="text" name="sportTitul" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Спортивне звання" required>
						  	
						  </div>
                          <div class="form-group"><label>Місто</label>
						  	
						    	<input type="text" name="city" class="form-control" id="exampleInputName1" aria-describedby="emailHelp" placeholder="Місто" required>
						  	
						  </div>

                          <div class="form-group"><label>Почткові очки</label>
                          
                                <input type="number" id="countPointStart" name="countPointStart" min="100" max="1000">
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

@endsection