<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="estilo/estilo.css">
    <!-- Icones - Google icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Listagem de Jogos</title>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        $ordem = $_GET['o'] ?? "n";
        $chave =$_GET['c'] ?? "";
    ?>
    <div id="corpo">
        <?php include_once "topo.php"?>
        <h1>Selecione um jogo</h1>
        <!-- teste do Sistema de Mensagens -->
        <?php
         echo msg_sucesso("Arquivo carregado com sucesso.");
         echo msg_aviso("Voce esqueceu de colocar o nome!");
         echo msg_erro("!!! Falha no registo do jogo !!!");
        ?>
        <form method="get" id="busca" action="index.php">
            Ordenar: 
            <a href="index.php?o=n&c=<?php echo $chave;?>">Nome</a> | 
            <a href="index.php?o=p&c=<?php echo $chave;?>">Produtora</a> | 
            <a href="index.php?o=na<?php echo $chave;?>">Nota Alta</a> |
            <a href="index.php?o=nb<?php echo $chave;?>">Nota Baixa</a> |
            <a href="index.php">Mostrar Todos</a> |
            Buscar: <input type="text" name="c" size="10" maxlength="40">
            <input type="submit" value="Ok">
        </form>
        <table class="listagem">
            <?php
                $q = "SELECT jogos.cod, nome, generos.genero, produtoras.produtora, descricao, nota, capa FROM `jogos` JOIN `generos`  ON jogos.genero = generos.cod JOIN produtoras ON jogos.produtora = produtoras.cod ";

                if(!empty($chave)){//Se a chave não estiver vazia
                    $q .= "WHERE jogos.nome like '%$chave%' OR produtoras.produtora like '%$chave%' OR generos.genero like '%$chave%' ";
                }

                switch($ordem){
                    case "p":
                        $q .= "ORDER BY produtoras.produtora";
                        break;
                    case "na": 
                        $q .= "ORDER BY jogos.nota DESC"; // ordem decrescente
                        break; 
                    case "nb":
                        $q .= "ORDER BY jogos.nota ASC";  // ordem crescente
                        break;
                    default:
                        $q .= "ORDER BY jogos.nome";
                        break;

                }
                $busca = $banco->query($q);
                if(!$busca){//Verifica se a busca não aconteceu apresentando um erro
                    echo "<tr><td>Infelizmente não foi possivél efectuar a busca!";
                } else {
                    if($busca->num_rows == 0){
                        echo "<tr><td>Nenhum registo encontrado!";
                    } else {
                        while($reg = $busca->fetch_object()){
                            $imgThumb = thumb($reg->capa);  
                            echo "<tr><td><img src='$imgThumb' class='mini'/>";
                            echo "<td><a href='detalhes.php?cod=$reg->cod'>$reg->nome</a>";
                            echo " [$reg->genero]";
                            echo "<br> $reg->produtora";
                            echo "<td>Adm";
                        }
                    }
                }
            ?>
        </table>
    </div>
    <?php include_once "rodape.php";?>
</body>
</html>