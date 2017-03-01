<?php
function ENCRYPT($text, $salt, $password) {
  return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, SALT($salt, $password), $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function DECRYPT($text, $salt, $password) {  
  return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, SALT($salt, $password), base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

function COVER($text, $salt) {
  return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $salt, $text, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
}

function DECOVER($text, $salt) {
  return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $salt, base64_decode($text), MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND)));
}

function SALT($salt, $password) {
  return hash("tiger128,3", "01e2f78da232be9d5ea102df6ffc37b06e145d2b1043e462d92d5f870796bb3b". $salt . $password);
}
?>