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
					        <input id="naslov" name="naslov" type="text" class="form-control input-md" required="" placeholder="Наслов"{{ (Input::old('naslov')) ? ' value="' . e(Input::old('naslov')) . '"' : '' }}>
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
					        <textarea class="form-control" id="textarea" name="textarea" required="" placeholder="Опис" rows="10" cols="300"{{ (Input::old('textarea')) ? ' value="' . e(Input::old('textarea')) . '"' : '' }}></textarea>
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
					      <div class="col-md-offset-3 col-md-3 ">
					      	<div class="checkbox">
					        <label style="color:#333666">
					          <input type="checkbox" id="can_edit" name="can_edit" > <strong>Others can edit</strong>
					        </label>
					      </div>
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

		<div class="row well" id="well_naslov">
			<h1> Внесени налози</h1>
		</div>

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

			function edit_fn(row_id, username_id, user_modified, editable) {

				isSameUser = (username_id == user_modified) ? 1 : 0;
				// console.log(isSameUser); 

				$.post('/it-server/ajax/get-edit-ajax',
				  		{ id: row_id,
				  		  user: username_id,
				  		  edit_user: user_modified,
				  		  same_user: isSameUser
				  		},
				  		function(o){
				  			$('#naslov').val(o.name);
							$('#textarea').val(o.description);
							
				  			console.log(o);
				  		},				  		 
				  		'json'
				    );

				if((editable == 1) && (username_id == user_modified)){
					console.log('zadovoluva editable i user=modif');
					$('#can_edit').attr("disabled", false);									
					$('#can_edit').prop('checked', true);								
				}else if((editable == 1) && (username_id != user_modified)){
					console.log('zadovoluva editable a user != modif');
					$('#can_edit').prop('checked', true);
					$('#can_edit').attr("disabled", true);
				}else if((editable == 0) && (username_id == user_modified)) {
					console.log('editable = 0');
					$('#can_edit').attr("disabled", false);
				}

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
								->orderby('modified_at','desc')
								->paginate(10);	

			$current_user = Auth::user()->username;
			$user_group = Auth::user()->user_group;
			
			foreach ($allViews as $view) { 

			$id = $view->id;		

			$full_name = DB::table('views')
							->join('users', function($join) use($id){
								$join->on('views.user','=','users.username')
									 ->where('views.id','=', $id);
							})
							->select('users.full_name')							
							->get();
							// print_r($full_name);
							// dd($full_name[0]);
							if(isset($full_name[0])){
								$name = $full_name[0]->full_name;								
							} else {
								$name = 'Anonymous';
							}
		?>

				<div class="row well row-aktivnosti" style="border: 1px solid black" id='row_{{$view->id }}' >
					<div class="col-sm-3">
								<h4><strong>{{ $name }}</strong></h4>
								<h4>{{ $view->created_at }}</h4><hr>
								@if(Session::has('edit_user') || ($view->modified_user != NULL))
									<!-- <h4>modified by: {{ Session::get('edit_user') }}</h4> -->
									<span class="modified_span">
										<h4><i>last edit by: <span>{{ $view->modified_user }}</span>
												<h5>{{ $view->updated_at }}</h5>
											</i>
										</h4>
									</span>
									{{ Session::forget('edit_user') }}
								@endif
								

					</div> 
				
					<div class="col-sm-6" style="border-left:1px solid black">
						<h2>{{ $view->name }}</h2>							
						<span>{{ nl2br($view->description) }}<span>					
					</div>

					<div class="col-sm-2 col-md-offset-1">
						@if(($current_user == $view->user) || ($user_group == 5))
							<button class="btn btn-primary" id="btn{{ $view->id }}" onclick="remove_fn('{{$view->id }}')">Remove</button>
						@endif
						@if(($current_user == $view->user) || ($user_group == 5) || ($view->editable == 1))
							<button type="button" class="btn btn-info" onclick="edit_fn('{{$view->id }}','{{$view->user}}', '{{$current_user}}', '{{$view->editable}}')">Edit</button><br/>
						@endif
					</div>
					

				</div>

				
			<?php } 

			 // pagination links
			echo '<div style="text-align:center">'.$allViews->links().'</div>';
		 ?>

	@stop

	@else
		<span class="globalni_poraki">
			<h3>You are not signed in.</h3>
		</span>
	@endif
@stop

