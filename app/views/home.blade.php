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





	@else
		<h3>You are not signed in.</h3>
	@endif
@stop