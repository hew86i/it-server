<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home() {

		// echo $user = User::find(1)->username;
		// echo '<pre>', print_r($user), '</pre>';
		
		return View::make('home', array('new'=>'You are in Home'));
	}

	public function postVnesiNalog() {

		$validator = Validator::make(Input::all(),
			array(
				'naslov' 	=> 'required',
				'textarea' 	=> 'required'				
			)

		);

		if($validator->fails()) {
			// die('Failed.');
			return Redirect::route('home')
					->withErrors($validator);
					
		} else {

			if(Session::has('id_post')){
				$id_post = Session::get('id_post');
				$view_username = Session::get('username_id');
				// $edit_user = Session::get('edit_user');

				Session::forget('id_post');
				Session::forget('username_id');
				// Session::forget('edit_user');
				// edit view
				
				$star_nalog = Oglasna::find($id_post);

				$star_nalog->name = e(Input::get('naslov'));
				$star_nalog->description = e(Input::get('textarea'));
				$star_nalog->user = $view_username;
				$star_nalog->rank = 0;
				$star_nalog->status = 1;
				$star_nalog->new = 1;

				$star_nalog->save();



				return Redirect::route('home');
									


			} else {

				// insert new view
				// Vnesi nalog
				$naslov = e(Input::get('naslov'));
				$opis = e(Input::get('textarea'));		

				$nalog = Oglasna::create(array(
					'name' => $naslov, 
					'description' => $opis,
					'user' => Auth::user()->username,
					'rank' => 0,
					'status' => 1, 
					'new' => 1
				));

				if($nalog->save()) {				

					return Redirect::route('home');
									// ->with('global',"session:".$id_post);	
				}
			// print_r(Input::all());
			}
			

		}

	}


}