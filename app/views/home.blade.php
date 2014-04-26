@extends('layout.main')

@section('content')
	@if(Auth::check())
		<h3><span class="globalni_poraki">Hello, {{ Auth::user()->username }}.</span></h3>
		<div class="row">
		<div class="col-md-8 col-md-height" id="test1" style="background-color:#97CBFF; margin-bottom:10px">		


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
					      
					      <div class="col-xs-10 input-lg">
					        <input id="naslov" name="naslov" type="text" class="form-control input-md" placeholder="Наслов"{{ (Input::old('naslov')) ? ' value="' . e(Input::old('naslov')) . '"' : '' }}>
					      </div>
					      <div class="col-xs-2">
      						<p class="form-control-static help-text"></p>
    					  </div>
    					  <label for="naslov" class="control-label col-xs-4">
									@if($errors->has('naslov'))
										{{ $errors->first('naslov') }}
									@endif
						  </label>

					    </div>
					    
					    <!-- Textarea -->
					    <div class="form-group" >
					      <!-- <label class="col-md-2 control-label" for="textarea">
					        Опис
					      </label> -->
					      <div class="col-xs-10">
					        <textarea class="form-control" id="textarea" name="textarea" placeholder="Опис" rows="10" cols="300"{{ (Input::old('textarea')) ? ' value="' . e(Input::old('textarea')) . '"' : '' }}></textarea>
					      </div>
					      <label for="textarea" class="control-label col-xs-4">
									@if($errors->has('textarea'))
										{{ $errors->first('textarea') }}
									@endif
						  </label>

					    </div>
					    
					    <!-- Button -->
					    <div class="form-group">
					      <!-- <label class="col-md-2 control-label" for="prati">
					      </label> -->
					      <div class="col-xs-2">
					        <button id="prati" name="prati" class="btn btn-primary">
					          внеси налог
					        </button>
					      </div>

					      <div class="col-xs-2">
					        <button id="cancel" name="cancel" class="btn btn-info" style="display: none;">
					          Cancel
					        </button>
					      </div>
					      
					      <div class="col-xs-offset-3 col-xs-3 ">
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

		<div class="left-panel col-md-4 col-md-height globalni_poraki">
			<h3>Panel</h3><hr>

		</div>
	
	</div> <!-- row za vnesi forma -->
	
	@section('listing')		
	
	<div id="lista_nalozi">
		<div class="row well" id="well_naslov">
			<h1> Внесени налози</h1>
		</div>

		<script>

			function remove_fn(row_id){				
				$.ajax(
				  	{
				  		url: '/it-server/ajax/remove-view',
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
				console.log("checked : " + $('#can_edit').prop('checked'));
				console.log(isSameUser);
				var isChecked = $('#can_edit').prop('checked'); 

				$.post('/it-server/ajax/edit-view',
				  		{ id: row_id,
				  		  user: username_id,
				  		  edit_user: user_modified,
				  		  same_user: isSameUser,
				  		  editable: editable,
				  		  checked: isChecked
				  		},
				  		function(o){
				  			$('#naslov').val(o.name);
							$('#textarea').val(o.description);
							
				  			console.log(o);
				  			
				  		},				  		 
				  		'json'
				    );

				if(isSameUser) {
					$('#can_edit').attr("disabled", false);
				} else {
					$('#can_edit').attr("disabled", true);
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

				$('#lista_nalozi').on('click', '.btn_edit', function(){

					console.log('EDIT BTN pressed...');
					$('#cancel').css('display', 'inline-block');

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

				<div class="row well row-aktivnosti" id='row_{{$view->id }}' >
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
							<button type="button" class="btn btn-info btn_edit" onclick="edit_fn('{{$view->id }}','{{$view->user}}', '{{$current_user}}', '{{$view->editable}}')">Edit</button><br/>
						@endif
					</div>
					

				</div>


				
			<?php } 

			 // pagination links
			echo '<div style="text-align:center">'.$allViews->links().'</div>';
		 ?>

		 </div>
	@stop

	@else
		<span class="globalni_poraki">
			<h3>You are not signed in.</h3>
		</span>
	@endif
@stop

