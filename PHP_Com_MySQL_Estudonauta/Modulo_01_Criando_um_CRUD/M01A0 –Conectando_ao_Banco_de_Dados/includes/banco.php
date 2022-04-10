<?php
    //$banco = new mysqli(host, utilizador, senha, nome da base de dados);
    $banco = new mysqli("localhost", "root", "", "bd_games");
    if($banco->connect_errno) {
        echo "<p>Encontreio um erro $banco->connect_errno --> $banco->connect_error</p>";
        die();//Mata o processo de conecção com a base de dadao se der algum erro
    }

    //Query ao banco de dados
    $banco->query("");
    $banco->query("");
    $banco->query("");
    $banco->query("");

    //Consulta com select
    $busca = $banco->query("select * from generos");
    if(!$busca){
        echo "</p>Falha na busca! $banco->error</p>";
    } else {
        $registo = $busca->fetch_object();
        print_r($registo);
    }