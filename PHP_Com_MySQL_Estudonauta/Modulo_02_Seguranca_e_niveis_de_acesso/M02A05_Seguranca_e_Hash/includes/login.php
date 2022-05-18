<?php
    
    function gerarHash($senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        return $hash;
    }

    echo gerarHash('teste') . "<br>";