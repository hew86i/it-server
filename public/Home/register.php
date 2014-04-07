<?php
require_once 'core/init.php';
require_once 'core/common.inc.php';
require_once 'core/navbar.php';


if(Input::exists()) {
	if(Token::check(Input::get('token'))) {
	//echo "in run";
	$validate = new Validation();
	$validation = $validate->check($_POST, array(
		'username' => array(
			'required' => true,
			'min' => 5,
			'max' => 20,
			'unique' => 'users'
		),
		'password' => array(
			'required' => true,
			'min' => 6
		),
		'password_again' => array(
			'required' => true,
			'matches' => 'password'
		),
		'name' => array(
			'required' => true,
			'min' => 2,
			'max' => 50
		)
	));

	if($validation->passed()) {
		
		$user = new User();		
		$salt = Hash::salt(32);
		
		try {
			$user->create(array(				
				'username' => Input::get('username'),
				'password' => Hash::make(Input::get('password'), $salt),
				'salt' => $salt,
				'name' => Input::get('name'),				
				'joined' => date('Y-m-d H:i:s'),
				'group' => 1
				
			));
			
			Session::flash('home', 'You have been registered!');			
			Redirect::to('index.php');
			
		} catch (Exception $e) {
			die($e->getMessage());
		}

	} else {		
		foreach ($validation->errors() as $error) {
			echo "<p> $error * </p>";			
		}
	}
	}
}

displayPageHeader(" - РЕГИСТРАЦИЈА - ");
displayNavbar();

?>
<style type="text/css">
	body {
		margin-top: 45px;
	}
</style>

<div class="container" style="margin-top:50px; width:1500px">

<div >
<form class="form-horizontal" action="" method="post">
	<fieldset>
		<!-- Form Name -->
		<legend style="padding-left:40px">Регистрација</legend>
		
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="username">Username</label>
			<div class="col-sm-3">
				<input id="username" name="username" type="text" placeholder="" class="form-control input-md" value="<?php echo escape(Input::get('username')) ?>" autocomplete="off">				
			</div>
			<div class="col-sm-3" id="username-error">
				<h5>задолжително</h5>
			</div>
		</div>
		<!-- Password input-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password">Choose password</label>
			<div class="col-sm-3">
				<input id="password" name="password" type="password" placeholder="" class="form-control input-md">
			</div>
		</div>
		<!-- Password input-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password_again">Repeat password</label>
			<div class="col-sm-3">
				<input id="password_again" name="password_again" type="password" placeholder="" class="form-control input-md">
			</div>
		</div>
		<!-- Text input-->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="name">Your Name</label>
			<div class="col-sm-3">
				<input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="<?php echo escape(Input::get('name')) ?>" autocomplete="off">
			</div>
		</div>		
		<!-- Button -->
		<div class="form-group">
			<label class="col-sm-2 control-label" for="submit">register</label>
			<div class="col-sm-3">
				<button id="submit" name="submit" class="btn btn-default">OK</button>
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
</div>  <!-- end panel-->
</div>  <!-- end container -->

<script type="text/javascript">
	$(document).ready(function() {
    $("#submit").click(function(){
        alert("button");
    }); 
});
    }); 
</script>


<?php

displayPageFooter(); ?>
