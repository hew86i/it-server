<?php
require_once('core/init.php');

// $view = DB::getInstance()->get('view', array('status','>=',0));
$view = DB::getInstance()->query("SELECT id, status, name, description, user, created FROM view WHERE status > 0");
$js = json_encode($view->results());
// $update = DB::getInstance()->query("UPDATE view SET new = 0 WHERE status = 1");

echo $js;

?>
