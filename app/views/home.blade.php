@extends('layout.main')

@section('content')
	@if(Auth::check())
		<h3><span class="globalni_poraki">Hello, {{ Auth::user()->username }}.</span></h3>
		
		<div class="row">
		<div class="col-md-8" id="test1" style="background-color:#97CBFF; margin-bottom:10px">		


				<form id="vnesi-form" class="form-horizontal" action="{{ URL::route('form-enter-nalog') }}" method="post" style="width:100%">
					  <fieldset>
					    
						<div class="globalni_poraki">
					    	<h3>Внеси налог</h3><hr>							
						</div>
					    
					    <!-- Text input-->
					    <div class="form-group">
					     <!--  <label class="col-md-2 control-label" for="naslov">
					        Наслов
					      </label> -->
					      
					      <div class="col-md-10 input-lg">
					        <input id="naslov" name="naslov" type="text" placeholder="Наслов" class="form-control input-md" required="">
					      </div>
					      <div class="col-sm-2">
      						<p class="form-control-static help-text"></p>
    					  </div>

					      
					    </div>
					    
					    <!-- Textarea -->
					    <div class="form-group" >
					      <!-- <label class="col-md-2 control-label" for="textarea">
					        Опис
					      </label> -->
					      <div class="col-md-10">
					        <textarea class="form-control" id="textarea" name="textarea" placeholder="Опис" rows="10" cols="300"></textarea>
					      </div>
					    </div>
					    
					    <!-- Button -->
					    <div class="form-group">
					      <!-- <label class="col-md-2 control-label" for="prati">
					      </label> -->
					      <div class="col-md-4">
					        <button id="prati" name="prati" class="btn btn-primary">
					          внеси налог
					        </button>
					      </div>
					    </div>

					    {{Form::token()}}						
					    
					  </fieldset>
				</form>
		</div>

		<div class="col-md-4">
			
		</div>
	
	</div> <!-- row za vnesi forma -->
	
	@section('listing')		

		<div class="row well" style="margin-top 10px">
			<h1> Внесени налози</h1>
		</div>
		<style type="text/css">
			ul,ol {
				margin-left: 10px;
				}
		</style>

		<script>

			function remove_fn(row_id){				
				$.ajax(
				  	{
				  		url: '/it-server/ajax/get-ajax',
				  		type: 'POST',
				  		data: { id: row_id},			  		

				  	}
				  		)
				  	.done(function( msg ) {
				  		// alert(msg);
						$('#row_'+row_id).remove();
						});			  
				  }

			function edit_fn(row_id) {

				  $.post('/it-server/ajax/get-edit-ajax',
				  		{ id: row_id},
				  		function(o){
				  			$('#naslov').val(o.name);
							$('#textarea').val(o.description);
				  			console.log(o);
				  		},				  		 
				  		'json'
				    );
				  $("html, body").animate({ scrollTop: 0 }, "slow");

				}


			$(document).ready(function(){

				$('#naslov').keyup(function(e) {
					
   					var username = $(this).val();  					                   
                  

   					if(username.length > 5) {
   						$(this).parent().addClass(' has-success');
   					};
   					
					console.log(username);
				});	

				

			});
		
		</script>

		<?php

			$allViews = Oglasna::GetActive()
								->orderby('created_at','desc')
								->paginate(10);			
			
			
			foreach ($allViews as $view) { ?>
				<div class="row well row-aktivnosti" style="border: 1px solid black" id='row_{{$view->id }}' >
					<div class="col-sm-3">
								<h4>{{ $view->user}}</h4>
								<h4>{{ $view->created_at }}</h4>								
					</div> 
				
					<div class="col-sm-6" style="border-left:1px solid black">
						<h2>{{ $view->name }}</h2>							
						<p>{{$view->description}}<p>					
					</div>

					<div class="col-sm-2 col-md-offset-1">
						<button class="btn btn-primary" id="btn{{ $view->id }}" onclick="remove_fn('{{$view->id }}')">Remove</button>
						<button type="button" class="btn btn-info" onclick="edit_fn('{{$view->id }}')">Edit</button><br/>
					</div>
					

				</div>

				
			<?php } 

			 // pagination links
			echo '<div style="text-align:center">'.$allViews->links().'</div>';
		 ?>

	@stop

	@else
		<h3>You are not signed in.</h3>
	@endif
@stop

