<?php
function ENCRYPT($text, $salt, $password)
{
  return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT($salt, $password), $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function DECRYPT($text, $salt, $password)
{  
  return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SALT($salt, $password), base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

function SALT($s, $p)
{
  return md5("". $s . $p);
}
?>