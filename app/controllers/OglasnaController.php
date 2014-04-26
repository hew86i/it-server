<?php 

/**
* Oglasna Controller
*/
class OglasnaController extends BaseController
{
	
	public function oglasna() {

		$updateOglasna = Oglasna::where('status', '=', 1)->update(array('new' => 1));

		return View::make('oglasna.tv');
	}

	public function aktivniOglasna() {

			$aktivni = DB::table('views')
							->join('users', function($join) {
								$join->on('views.user','=','users.username')
									 ->where('views.status','=', 1)
									 ->where('views.new','=', 1);
							})							
							->select('views.id as id',
									 'views.status',
									 'views.name as title',
								 	 'views.description',
								 	 'users.full_name as user',
								 	 'views.modified_at as created',
								 	 'views.modified_user as edit_user')													
							->get();							
							// dd($aktivni);
			$response = Response::json($aktivni);			

			$update = Oglasna::where('status', '=', 1)
								->update(array('new' => 0));

		return $response;	
	}

	public function neaktivniOglasna() {

		$neaktivni = Oglasna::where('status', '=', 9)
							->select('id', 'status')
							->get();

		// dd($neaktivni);

		return Response::json($neaktivni);
	}


	public function counter() {

		$record_count = Oglasna::all()->count();

		$logic = $_POST['remove_btn'];

		return Response::json(array(
				'record_count' => $record_count,
				'logic' => $logic
			));

	}
}

