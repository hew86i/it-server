<?php
class Hash{

	public static function make($string, $salt = '') {
		return  hash("sha256", $string . $salt);
	}

	public static function salt($length) {
		//return mcrypt_create_iv($length, MCRYPT_DEV_URANDOM);
		return self::makeSalt($length);
	}

	public static function unique() {
		return self::make(uniqid());
	}

	public static function makeSalt($max=40) {
         $i = 0;
         $salt = "";
         $characterList = "./ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
         while ($i < $max) {
            $salt .= $characterList{mt_rand(0, (strlen($characterList) - 1))};
            $i++;
         }
         //die($salt);
         return $salt;
     }

}

?>