<?php
//encrypt decrypt
$original_string = "Here's my string";
echo "Data before encryption: " . $original_string . "<br>";
//cipher method
$ciphering = "AES-128-CTR";
//openssl encryption
$iv_length = openssl_cipher_iv_length($ciphering); 
$options = 0;
// not null intializtion vector
$encryption_iv = '1234567891011121';
//store encryption key
$encryption_key = "deepyes02";
//openssl encryption function
$encryption = openssl_encrypt($original_string, $ciphering, $encryption_key, $options, $encryption_iv);
//echo encryped stri
echo "<br>encrypted data: ".$encryption;
//decryption key
$decryption_key = "deepyes02";
$decryption = openssl_decrypt($encryption, $ciphering, $encryption_key, $options, $encryption_iv);
echo "<br>Decrypted Data: " . $decryption;
?>