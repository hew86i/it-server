<?php
require_once('core/init.php');

// $view = DB::getInstance()->get('view', array('status','>=',0));
// $view = DB::getInstance()->query("SELECT id, status, name, description, user FROM view WHERE status = 1 AND new = 1");

$view2 = DB::getInstance()->AssQuery("SELECT view.id, view.status, view.name as title, view.description, users.name as user, view.created
							FROM view
							INNER JOIN users
							ON view.user = users.username
							WHERE view.status = 1 AND view.new = 1");

	
	// foreach ($view2->results() as $key => $value) {

	// 	print_r($value['created']);
	// 	$value['created'] = "11-02-2014";
		
	// 	foreach ($res as $key => $value) {
	// 		// print_r($key);
	// 		if ($key == 'created') { 

	// 		// ZA DA GI OTSTRANI MILISEKUNDITE

	// 		// $var = substr($value, 0, -4); 
	// 		$res[$key] = date("d-M-Y H:i", strtotime($value));
			
			
	// 		continue;
	// 		}
		
	// 	}			
		
	// 	die();
	// }
			

$js = json_encode($view2->results());
$update = DB::getInstance()->query("UPDATE view SET new = 0 WHERE status = 1");

echo $js;

?>
