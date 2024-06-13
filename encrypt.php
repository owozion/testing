<?php
// Define a secret key and initialization vector (IV)
// The key should be 32 bytes (256 bits) for AES-256-CBC
$secret_key = '12345678901234567890123456789012'; // 32 bytes key
$iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));

// Text to encrypt
$plain_text = 'Welcome to Lagos';

// Function to convert binary data to hexadecimal
function bin2hex_custom($data) {
    return bin2hex($data);
}

// Function to convert hexadecimal data to binary
function hex2bin_custom($data) {
    return hex2bin($data);
}

// Encrypt the text
function encrypt($plain_text, $secret_key, $iv) {
    $encrypted_text = openssl_encrypt($plain_text, 'aes-256-cbc', $secret_key, OPENSSL_RAW_DATA, $iv);
    return bin2hex_custom($encrypted_text . '::' . $iv);
}

// Decrypt the text
function decrypt($cipher_text, $secret_key) {
    $cipher_text = hex2bin_custom($cipher_text);
    list($encrypted_data, $iv) = array_pad(explode('::', $cipher_text, 2), 2, null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $secret_key, OPENSSL_RAW_DATA, $iv);
}

// Encrypt the plain text
$encrypted_text = encrypt($plain_text, $secret_key, $iv);
echo "Encrypted Text: " . $encrypted_text . "\n";

// Decrypt the text
$decrypted_text = decrypt($encrypted_text, $secret_key);
echo "Decrypted Text: " . $decrypted_text . "\n";
?>