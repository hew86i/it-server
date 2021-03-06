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

		$has_can_edit = (Input::has('can_edit')) ? 1 : 0;


		if($validator->fails()) {
			// dd($validator);
			return Redirect::route('home')
					->withErrors($validator)
					->withInput();
					
		} else {

			if(Session::has('edit_mode') && Session::get('edit_mode') == true){
				// dd($_POST);

				Session::put('edit_mode', false);

				$id_post = Session::get('id_post');
				$view_username = Session::get('username_id');
				// $edit_user = Session::get('edit_user');

				Session::forget('id_post');
				Session::forget('username_id');
				Session::forget('edit_user');
				
				Session::put('edit_mode', false);
				// edit view
				$star_nalog = Oglasna::find($id_post);
				
				// ako e stisnato cancel			
				if(isset($_POST['cancel'])) {
					// dd($_POST);
					
					$star_nalog->status = 1;
					$star_nalog->new = 1;

					$star_nalog->modified_user = Session::get('prev_mod_user');
					$star_nalog->editable = Session::get('prev_editable');

					$star_nalog->save();
					
					Session::forget('prev_mod_user');
					Session::forget('editable');

					return Redirect::route('home');
				} else {


					$star_nalog->name = Input::get('naslov');
					$star_nalog->description = Input::get('textarea');
					$star_nalog->user = $view_username;
					$star_nalog->rank = 0;
					$star_nalog->status = 1;
					$star_nalog->new = 1;
					$star_nalog->modified_at = date('Y-m-d H:i:s');

					if(isset($_POST['can_edit']) && $_POST['can_edit'] == "on") {
						$star_nalog->editable = 1;						
					} else if (Session::get('same_user') == 1){
						$star_nalog->editable = 0;
						
					}			

					Session::forget('same_user');


				$star_nalog->save(); }

				return Redirect::route('home'); 

			} else {

				// insert new view
				// Vnesi nalog
				$naslov = Input::get('naslov');
				$opis = Input::get('textarea');		

				$nalog = Oglasna::create(array(
					'name' => $naslov, 
					'description' => $opis,
					'user' => Auth::user()->username,
					'rank' => 0,
					'status' => 1, 
					'new' => 1,
					'editable' => $has_can_edit

				));
				$nalog->modified_at = date('Y-m-d H:i:s');

				if($nalog->save()) {
					
					return Redirect::route('home');
									// ->with('global',"session:".$id_post);	
				}
			
			}
			

		}

	}	


}