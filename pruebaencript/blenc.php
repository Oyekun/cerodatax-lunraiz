<?php

  ini_set("blenc.key_file", "keys.txt");
    $key = blenc_encrypt(file_get_contents("Auth.php"), "Auth.phpe");
    file_put_contents("keys.txt", $key);
    include_once("Auth.phpe");

    unlink("keys.txt");
    unlink("Auth.phpe");
?> 