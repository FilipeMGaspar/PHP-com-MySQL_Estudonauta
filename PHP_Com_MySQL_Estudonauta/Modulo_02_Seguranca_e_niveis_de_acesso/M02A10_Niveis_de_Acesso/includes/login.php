<?php

    // Inicio de sessão
    session_start();
    
    if(!isset($_SESSION['user'])){
        $_SESSION['user'] = "";
        $_SESSION['nome'] = "";
        $_SESSION['tipo'] = "";
    }
    
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
        $ok = password_verify(cripto($senha), $hash);
        return $ok;
    }

    function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['nome']);
        unset($_SESSION['tipo']);
    }

    function is_logado(){
        if(empty($_SESSION['user'])){
            return false;
        } else {
            return true;
        }
    }

    function is_admin() {
        $t = $_SESSION['tipo'] ?? null;
        if(is_null($t)){
            return false;
        } else {
            if($t == 'admin') {
                return true;
            } else {
                return false;
            }
        }
    }

    function is_editor() {
        $t = $_SESSION['tipo'] ?? null;
        if(is_null($t)){
            if(is_null($t)) {
                return false;
            } else {
                if($t == 'editor') {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }