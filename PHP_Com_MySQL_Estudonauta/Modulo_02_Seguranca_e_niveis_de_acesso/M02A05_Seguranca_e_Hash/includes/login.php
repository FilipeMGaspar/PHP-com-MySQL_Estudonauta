<?php
    
    function gerarHash($senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash($senha, $hash) {
        $ok = password_verify($senha, $hash);
        return $ok;
    }

    echo gerarHash('teste') . "<br>";

    $tstHash = '$2y$10$hJjCG9/iuf8MR/qtpBi/te8qB67z02ZNjXQr2mNdcqRBtN93CBIhy';