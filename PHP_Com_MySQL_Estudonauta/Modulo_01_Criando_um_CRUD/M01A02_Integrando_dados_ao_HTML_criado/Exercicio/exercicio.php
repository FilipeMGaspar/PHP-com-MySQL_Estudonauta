<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício M01A02 Integrando dados ao HTML criado</title>
    <link rel="stylesheet" href="estilo/style.css">
</head>
<body>
    <?php
        require_once "includes/banco.php";
    ?>
    <div id="corpo">
        <table class="listagem">
            <?php
                 $busca = $ligacaoBanco->query("select * from clientes"); //Pesquisa na base de dados na tabela clientes

                 if(!$busca){ //Se a busca não acontecer
                    echo "<tr><td>Não foi possivel encontrar dados de cliente!";
                 }else {
                    if($busca->num_rows == 0){
                        echo "<tr><td>Sem dados disponiveis!";
                    } else{
                        while($registo = $busca->fetch_object()){
                            echo "<tr><td>$registo->NomeCliente<tr><td>$registo->endereço<tr><td>$registo->telefone";
                          }
                    }
                 }
            ?>
            <tr><td>Nome</td><td>Endereço</td><td>Telefone</td></tr>
            <tr><td>Nome</td><td>Endereço</td><td>Telefone</td></tr>
            <tr><td>Nome</td><td>Endereço</td><td>Telefone</td></tr>
            <tr><td>Nome</td><td>Endereço</td><td>Telefone</td></tr>
        </table>
    </div>
    <?php
        $ligacaoBanco->close();
    ?>
</body>
</html>