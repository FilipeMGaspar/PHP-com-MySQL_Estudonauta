<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <title>Listagem de Jogos</title>
</head>
<body>
    <?php
        require_once "includes/banco.php";
    ?>

    <div id="corpo">
        <h1>Selecione um jogo</h1>
        <table class="listagem">
            <?php
                $busca = $banco->query("select * from jogos order by nome");
                if(!$busca){//Verifica se a busca não aconteceu apresentando um erro
                    echo "<tr><td>Infelizmente não foi possivél efectuar a busca!";
                } else {
                    if($busca->num_rows == 0){
                        echo "<tr><td>Nenhum registo encontrado!";
                    } else {
                        while($reg = $busca->fetch_object()){
                            echo "<tr><td>$reg->capa<td>$reg->nome";
                            echo "<td>Adm"
                        }
                    }
                }
            ?>
        </table>
    </div>
    <?php $banco->close(); //Fecho da ligação á base de dados?>
</body>
</html>