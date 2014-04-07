<?php

require_once('core/init.php');
 $row_to_delete=$_POST["id"];

 // DB::getInstance()->query("DELETE FROM view WHERE id = $row_to_delete");
 $brisi = DB::getInstance()->query("UPDATE view SET status = 9 WHERE id = $row_to_delete");

?>