<?php
    
    function cripto($senha){
        $c = '';
        for($pos = 0; $pos < strlen($senha); $pos++) {
            $letra = ord($senha[$pos]) + 1;
            echo chr($letra);
        }
    }

    function gerarHash($senha){
        $txt = cripto($senha);
        $hash = password_hash($txt, PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash($senha, $hash) {
        $ok = password_verify($senha, $hash);
        return $ok;
    }

    cripto('estudonauta');