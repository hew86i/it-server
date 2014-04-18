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

			// store to session			
			Session::put('id_post', $view_id);

			$view = Oglasna::find($view_id);
			echo json_encode(array('res' => true,
								 	'name' => $view->name,
								 	'description' => $view->description
							));

		} else {
			echo json_encode(array('res' => false));
		}

	}

	
}

 ?>
