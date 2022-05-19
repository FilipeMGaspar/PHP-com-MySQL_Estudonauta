<?php
    
    function cripto($senha){
        $c = '';
        for($pos = 0; $pos < strlen($senha); $pos++) {
            $letra = ord($senha[$pos]) + 1;
            $c .= chr($letra);
        }
        return $c;
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

    $original = 'estudonauta';
    echo $original . " --- <br>";
    echo cripto($original) . " --- <br>";
    echo "<br>". gerarHash($original) . "<br>";
    echo testarHash($original, '$2y$10$F2Jtnh5Wh6tDAutCatneJOUt1trs6cpJOGMkOUcnt4M2ehxiDjtTm')?"Senha Correta":"Senha Inválida!";