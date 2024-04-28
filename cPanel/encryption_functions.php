<?php
function encryptData($data, $key) {
    $cipher = "aes-256-cbc";
    $ivLength = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivLength);
    $encrypted = openssl_encrypt($data, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    $encryptedData = base64_encode($iv . $encrypted);
    return $encryptedData;
}

function decryptData($encryptedData, $key) {
    $cipher = "aes-256-cbc";
    $ivLength = openssl_cipher_iv_length($cipher);
    $data = base64_decode($encryptedData);
    $iv = substr($data, 0, $ivLength);
    $encrypted = substr($data, $ivLength);
    $decrypted = openssl_decrypt($encrypted, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    return $decrypted;
}
?>
