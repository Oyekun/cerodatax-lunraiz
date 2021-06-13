<?php

$text = $_POST['encrypted'];

$key = pack('H*','aaaaaaaaaaaaa');
$method = 'aes-256-ecb';

//$decrypted = decrypt($encrypted, $key, $method);
$encrypted = encrypt($text, $key, $method);
echo "<label>Resultado Encriptado</label>";
echo "<input type='text' value='$encrypted'></input>";
echo "<a type='button' href='http://cerodatax.com/licencia/licencia.php'> Atras </a>";
function encrypt(string $data, string $key, string $method): string
{
    $ivSize = openssl_cipher_iv_length($method);
        $iv = openssl_random_pseudo_bytes($ivSize);
        $encrypted = openssl_encrypt($data, $method, $key, OPENSSL_RAW_DATA, $iv);
    $encrypted = strtoupper(implode(null, unpack('H*', $encrypted)));
    return $encrypted;
}
 
?>