<?php
    
    function cripto($senha){
        $c = '';
        for($pos = 0; $pos < strlen($senha); $pos++) {
            $letra = $senha[$pos];
            echo " --- $letra --- ";
        }
    }

    function gerarHash($senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash($senha, $hash) {
        $ok = password_verify($senha, $hash);
        return $ok;
    }

    cripto('admin');