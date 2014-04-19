@extends('layout.main')

@section('content')


<div class="row">
	<div class="col-sm-10">
		<fieldset class="sign_in">
				<legend class="legend_create color_text"><h2>Sign in</h2></legend>

					<form class="form-horizontal" action="{{ URL::route('account-sign-in-post') }}" method="post" role="role">

							<div class="form-group">
								<label for="username" class="col-sm-2 control-label color_text">Username</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" id="username" name="username" placeholder="Username"{{ (Input::old('username')) ? ' value="' . e(Input::old('username')) . '"' : '' }}>
								</div>
								<label for="username" class="control-label">
									@if($errors->has('username'))
										{{ $errors->first('username') }}
									@endif
								</label>
							</div>							

							<div class="form-group">
								<label for="password" class="col-sm-2 control-label color_text">Password</label>
								<div class="col-sm-5">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password"{{ (Input::old('password')) ? ' value="' . e(Input::old('password')) . '"' : '' }}>
								</div>
								<label for="password" class="control-label">
									@if($errors->has('password'))
										{{ $errors->first('password') }}
									@endif
								</label>
							</div>

							<div class="form-group">
								<div class="checkbox col-sm-offset-2 color_text">
							    <label for="remember">
							    Remember me <input type="checkbox" name="remember" id="remember"></label>
							     <!--  <input type="checkbox" name="remember" id="remember"> Remember me --> 
							    <label for="forget" class="col-sm-offset-1">
							    	<a style="color:red" href="{{ URL::Route('account-forgot-password') }}">Forget your password?</a>
							    </label>
							 </div>
							</div>					
							
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-4">
									<button type="submit" value="Create account" class="btn btn-info">Sign in</button>
								</div>
							</div>

							{{Form::token()}}

					</form>

		</fieldset>

</div>

@stop