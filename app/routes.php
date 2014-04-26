<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Route::get('/', function()
// {
// 	return View::make('hello');
// });
// 

// Event::listen('illuminate.query', function($sql){

// 	Session::put('query', $sql);	
// });


/*======================================
=            Route to home             =
======================================*/
Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'

));

/*===========================================
=            Handles bad routing            =
===========================================*/

// App::missing(function($exception)
// {	
// 	return Redirect::route('home')->with('global','Sorry, bad url request...');
// });


Route::get('/user/{username}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));


/*============================================
=            Oglasna tabla router            =
============================================*/

Route::get('/oglasna', array(
	'as' => 'oglasna-tabla',
	'uses' => 'OglasnaController@oglasna'
));

Route::post('/oglasna/aktivni', array(
	'as' => 'oglasna-aktivni',
	'uses' => 'OglasnaController@aktivniOglasna'
));

Route::post('/oglasna/neaktivni', array(
	'as' => 'oglasna-neaktivni',
	'uses' => 'OglasnaController@neaktivniOglasna'
));


Route::post('/oglasna/counter', array(
	'as' => 'oglasna-counter',
	'uses' => 'OglasnaController@counter'
));




/*===========================================
=            Authenticated group            =
===========================================*/

Route::group(array('before' => 'auth'), function() {

	/*==================================
	=            CSRF group            =
	==================================*/
	
	Route::group(array('before' => 'csrf'), function(){

		/*=================================
		=            Sign out (POST)       =
		=================================*/

    	Route::post('/account/change-password', array(
		'as' => 'account-change-password-post',
		'uses' => 'AccountController@postChangePassword'		
		));


	}); 

	/*-----  End of CSRF group  ------*/

	

	/*=================================
	=            Sign out (GET)       =
	=================================*/

	Route::get('/account/sign-out', array(
		'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
	));
	
	/*========================================
	=            Change password (GET)       =	
	========================================*/

	Route::get('/account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'		
	));

	/*======================================
	=            Ajax-post test            =
	======================================*/
	

	Route::post('/ajax/remove-view', array(
		'as' => 'ajax-remove-view',
		'uses' => 'AjaxController@AjaxViewRemove'
	));


	Route::post('ajax/edit-view', array(
		'as' => 'ajax-edit-view',
		'uses' => 'AjaxController@AjaxViewEdit'
	));


	/*===========================================
	=            Form entering route            =
	===========================================*/	
	

	Route::post('/form/enter-nalog', array(
		'as' => 'form-enter-nalog',
		'uses' => 'HomeController@postVnesiNalog'
	));



});


/*-----  End of Authenticated group  ------*/





/*=============================================
=            Unauthenticated gorup            =
=============================================*/

Route::group(array('before' => 'guest'), function() {

	/*==================================
	=            CSRF group            =
	==================================*/
	
	Route::group(array('before' => 'csrf'), function() {

		/*=============================================
		=            Create account (POST)            =
		=============================================*/		

		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'));

		/*========================================
		=             Sign in (POST)             =
		========================================*/		

		Route::post('/account/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'));

		/*=========================================
		=            Forget password (POST)       =
		=========================================*/

		Route::post('/account/forgot-password', array(
			'as' => 'account-forgot-password-post',
			'uses' => 'AccountController@postForgotPassword'
		));	


	});
	
	/*-----  End of CSRF group  ------*/


	/*=========================================
	=            Forget password (GET)       =
	=========================================*/

	Route::get('/account/forgot-password', array(
		'as' => 'account-forgot-password',
		'uses' => 'AccountController@getForgotPassword'
	));	

	/*=========================================
	=            Recover password (GET)       =
	=========================================*/

	Route::get('/account/recover/{code}', array(
		'as' => 'account-recover',
		'uses' => 'AccountController@getRecover'
	));

	
	/*======================================
	=            Sign in (GET)             =
	======================================*/

	Route::get('/account/sign-in', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'));

	/*=============================================
	=            Create account (GET)             =
	=============================================*/	

	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));


});


/*-----  End of Unauthenticated gorup  ------*/