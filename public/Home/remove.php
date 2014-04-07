<?php

require_once('core/init.php');


$view = DB::getInstance()->query("SELECT id, status FROM view WHERE status = 9");
$js = json_encode($view->results());
// $remove = DB::getInstance()->query("UPDATE view SET status = 9 WHERE new = 0 AND status = 1");

echo $js;


?>
