<?php
    //$banco = new mysqli(host, utilizador, senha, nome da base de dados);
    $banco = new mysqli("localhost", "root", "", "bd_games");
    if($banco->connect_errno) {
        echo "<p>Encontreio um erro $banco->connect_errno --> $banco->connect_error</p>";
        die();//Mata o processo de conecção com a base de dadao se der algum erro
    }

    //Consulta com select
    $banco->query("select * from generos");