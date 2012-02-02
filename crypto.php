<?php
class Crypto{ 

public static function encrypt($data){
	$key="daw";
  	// encrypt using Blowfish/CBC
    	$enc = mcrypt_encrypt( MCRYPT_BLOWFISH, $key, $data, MCRYPT_MODE_CBC, $iv );
	return urlencode(base64_encode($enc));
}


public static function decrypt($enc){
    $key="daw";
	$enc=base64_decode(urldecode($enc));
    // decrypt (using same IV - a must for the CBC mode)
    return $dec = mcrypt_decrypt( MCRYPT_BLOWFISH, $key, $enc, MCRYPT_MODE_CBC, $iv );
}

}
?>
