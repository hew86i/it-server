@extends('layout.main')

@section('content')
	@if(Auth::check())
		<h3>Hello, {{ Auth::user()->username }}.</h3>
		
		<div class="row">
		<div class="col-md-12" id="test1" style="background-color:#B2FFFF">		


				<form class="form-horizontal" action="" method="post" style="width:70%">
					  <fieldset>
					    
					    <!-- Form Name -->
					    <legend>
					      Внеси налог
					    </legend>
					    
					    <!-- Text input-->
					    <div class="form-group">
					      <label class="col-md-4 control-label" for="naslov">
					        Наслов
					      </label>
					      
					      <div class="col-md-6 input-lg">
					        <input id="naslov" name="naslov" type="text" placeholder="" class="form-control input-md" required="">
					        
					      </div>
					    </div>
					    
					    <!-- Textarea -->
					    <div class="form-group" >
					      <label class="col-md-4 control-label" for="textarea">
					        Опис
					      </label>
					      <div class="col-md-6">
					        <textarea class="form-control" id="editor" name="textarea" rows="6" cols="140"></textarea>
					      </div>
					    </div>
					    
					    <!-- Button -->
					    <div class="form-group">
					      <label class="col-md-4 control-label" for="prati">
					      </label>
					      <div class="col-md-4">
					        <button id="prati" name="prati" class="btn btn-primary">
					          внеси налог
					        </button>
					      </div>
					    </div>						
					    
					  </fieldset>
				</form>
		</div>

	</div> <!-- row za vnesi forma -->

	@section('listing')		

		<div class="row well" style="margin-top 10px">
			<h2> Внесени налози</h2>
		</div>
		<style type="text/css">
			ul,ol {
				margin-left: 10px;
				}
		</style>

		<?php

			$allViews = Oglasna::GetActive()
								->orderby('created_at')
								->paginate(10);			
			
			
			foreach ($allViews as $view) { ?>
				<div class="row well row-aktivnosti" style="border: 1px solid black" id='row_<?php echo $view->id ?>' >
					<div class="col-sm-3">
								<h4><?php echo $view->user ?></h4>
								<h4><?php echo $view->created_at ?></h4>								
					</div> 
				
					<div class="col-sm-6" style="border-left:1px solid black">
						<h2><?php echo $view->name ?></h2>							
						<p><?php echo $view->description ?><p>					
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

