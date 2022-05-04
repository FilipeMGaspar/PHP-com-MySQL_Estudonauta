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
        require_once "includes/funcoes.php";
        $ordem = $_GET['o'] ?? "n";
        $chave =$_GET['c'] ?? "";
    ?>
    <div id="corpo">
        <?php include_once "topo.php"?>
        <h1>Selecione um jogo</h1>
        <form method="get" id="busca" action="">
            Ordenar: 
            <a href="M01A09.php?o=n">Nome</a> | 
            <a href="M01A09.php?o=p">Produtora</a> | 
            <a href="M01A09.php?o=na">Nota Alta</a> |
            <a href="M01A09.php?o=nb">Nota Baixa</a> |
            Buscar: <input type="text" name="c" size="10" maxlength="40">
            <input type="submit" value="Ok">
        </form>
        <table class="listagem">
            <?php
                $q = "SELECT jogos.cod, nome, generos.genero, produtoras.produtora, descricao, nota, capa FROM `jogos` JOIN `generos`  ON jogos.genero = generos.cod JOIN produtoras ON jogos.produtora = produtoras.cod ";

                if(){
                    
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