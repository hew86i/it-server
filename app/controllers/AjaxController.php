<?php 
// AjaxController.php


/**
* AjaxController
*/

class AjaxController extends BaseController
{
	
	public function getAjaxRequest(){

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

	public function getEditAjaxRequest() {

		if(isset($_POST)){

			$view_id = $_POST['id'];
			$view_username = $_POST['user'];
			$edit_user = $_POST['edit_user'];
			$same_user = $_POST['same_user'];

			// store to session			
			Session::put('id_post', $view_id);
			Session::put('username_id', $view_username);
			Session::put('edit_user', $edit_user);
			Session::put('same_user', $same_user);

			$view = Oglasna::find($view_id);

			// za oglasna tabla
			$view->status = 1;
			$view->modified_user = $edit_user;


			$view->save();

			echo json_encode(array('res' => true,
								 	'name' => $view->name,
								 	'description' => $view->description,
								 	'user' => $view_username
							));

		} else {
			echo json_encode(array('res' => false));
		}

	}

	
}

 ?>
