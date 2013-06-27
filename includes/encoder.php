<?php

class Encoder {

	static function Encode($sPassword){

		$salt = hash('sha1', $sPassword);

		$sNewPass = hash('md5', $sPassword).$salt ;

		return $sNewPass;
	}
}

?>