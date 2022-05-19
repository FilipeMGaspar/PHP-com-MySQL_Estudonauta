<?php
    
    function gerarHash($senha){
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        return $hash;
    }

    function testarHash() {

    }
    
    echo gerarHash('teste') . "<br>";