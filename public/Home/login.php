<?php
require_once 'core/init.php';
require_once 'core/common.inc.php';
require_once 'core/navbar.php';


if(Input::exists()) {
	if(Token::check(Input::get('token'))) {

		$validate = new Validation();
		$validation = $validate->check($_POST, array(
			'username' => array('required' => true),
			'password' => array('required' => true),
		));

		if($validation->passed()) {
			//log user in
			$user = new User();			
			
			$remember = (Input::get('remember') === 'on') ? true : false;
			//die($remember);				
			$login = $user->login(Input::get('username'), Input::get('password'), $remember);

			if($login) {
				//echo '  Success';
				Redirect::to('index.php');
			} else {
				echo '<p> Sorry, Login failed </p>';
			}


		} else {
			foreach ($validation->errors() as $error) {
				echo $error . " </br>";
			}
		}


	}
}
	
displayPageHeader(" - ЛОГИРАЊЕ - ");
displayNavbar();

?>

<style type="text/css">
	body {
		margin-top: 45px;
	}
</style>
<div class="container" style="margin-top:50px">

<form class="form-horizontal" action="" method="post">
	<fieldset>
		<!-- Form Name -->
		<legend>Login</legend>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="username">Username</label>
			<div class="col-sm-3">
				<input id="username" name="username" type="text" placeholder="" class="form-control input-md" value="<?php echo escape(Input::get('username')) ?>" autocomplete="off">
			</div>
		</div>
		<!-- Password input-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password">Password</label>
			<div class="col-sm-3">
				<input id="password" name="password" type="password" placeholder="" class="form-control input-md">
			</div>
		</div>		
		
		<!-- Button -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="submit">Login</label>
			<div class="col-sm-3">
				<button id="submit" name="submit" class="btn btn-default">ok</button>
			</div>			
		</div>
		<!-- checkbox -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="username">Remember me</label>
			<div class="col-sm-3" style="padding:5px;margin-left:12px">
				<input id="remember" name="remember" type="checkbox" >
			</div>
		</div>

		<!-- Hidden input-->
		<div class="form-group">
  			<label class="col-sm-2 control-label" for="token"></label>  
  			<div class="col-sm-3">
  				<input id="token" name="token" type="hidden" placeholder="" value="<?php echo Token::generate(); ?>" class="form-control input-md">    
  			</div>
		</div>

	</fieldset>	
</form>
</div>


<?php
	
displayPageFooter(); ?>