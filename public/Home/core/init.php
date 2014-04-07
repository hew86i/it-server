<?php
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => '127.0.0.1',
		'username' => 'root',
		'password' => 'root',
		'db' => 'it'
		),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 3600   // one hour
		),
	'session' => array(
		'session_name' => 'user',
		'token_name' => 'token'
		)
	);

spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))) {
	
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash','=', $hash));
	
	if($hashCheck->count()) {
		//echo "<h1>Hash maches, log in.</h1>";
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}	


?>