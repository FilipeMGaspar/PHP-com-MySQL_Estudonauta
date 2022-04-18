<?php
    //$ligacaoBanco = new mysqli(host, utilizador, senha, nome da base de dados);
    $ligacaoBanco = new mysqli("localhost", "root", "", "db_vendeBolachas");

    if($ligacaoBanco->connect_errno) {
        echo "<p>Encontreio um erro $banco->connect_errno --> $banco->connect_error</p>";
        die();//Mata o processo de conecção com a base de dadao se der algum erro
    }

        //Query ao banco de dados para codificação de dados em utf8
        $ligacaoBanco->query("SET NAMES 'UTF8'");
        $ligacaoBanco->query("SET character_set_connection=utf8");
        $ligacaoBanco->query("SET character_set_client=utf8");
        $ligacaoBanco->query("SET character_set_results=utf8");
    
       /* //Consulta com select
        $busca = $ligacaoBanco->query("select * from clientes");
        if(!$busca){
            echo "</p>Falha na busca! $ligacaoBanco->error</p>";
        } else {
            
          while($registo = $busca->fetch_object()){
            print_r($registo);
          }
        }
        */