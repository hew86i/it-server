<?php 
// AjaxController.php


/**
* AjaxController
*/

class AjaxController extends BaseController
{
	
	public function AjaxViewRemove(){

		if(isset($_POST)) {

			$view_id = $_POST['id'];
			$view = Oglasna::find($view_id);

			$view->status = 9;
			$view->new = 0;

			$view->save();								
			
		} else {
			echo 'post is not set';
		}
	}

	public function AjaxViewEdit() {

		if(isset($_POST)){

			$view_id = $_POST['id'];
			$view_username = $_POST['user'];
			$edit_user = $_POST['edit_user'];
			$same_user = $_POST['same_user'];
			$editable = $_POST['editable'];
			$isChecked = $_POST['checked'];

			// store to session	
			Session::put('edit_mode', true);		
			Session::put('id_post', $view_id);
			Session::put('username_id', $view_username);
			Session::put('edit_user', $edit_user);
			Session::put('same_user', $same_user);
			Session::put('isChecked', $isChecked);

			$view = Oglasna::find($view_id);

			// za oglasna tabla
			$view->status = 9;

			$prev_editable = $view->editable;
			$view->editable = $editable;
			Session::put('prev_editable', $prev_editable);

			$prev_mod_user = $view->modified_user;
			$view->modified_user = $edit_user;
			Session::put('prev_mod_user', $prev_mod_user);


			if($view->save()){
				echo json_encode(array('res' => true,
									'session_data' => Session::all(),
									'view_obj' => $view,
								 	'name' => $view->name,
								 	'description' => $view->description,
								 	'user' => $view_username,
								 	'prev_mod_user' => $prev_mod_user,
								 	'prev_editable' => $prev_editable
							));
			};			

		} else {
			echo json_encode(array('res' => false));
		}

	}

	
	
}