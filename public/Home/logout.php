<?php
require_once 'core/init.php';
require_once 'core/common.inc.php';

$user = new User(); // bez parametri se smeta momentalniot user
$user->logout();

Redirect::to('index.php');
	
displayPageHeader(" - LOGOUT - ");
?>


<?php
	

displayPageFooter(); 
?>