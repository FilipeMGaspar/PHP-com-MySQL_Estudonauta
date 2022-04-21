<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo/estilo.css">
    <title>Título da página</title>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
    ?>
    <div id="corpo">
        <?php
            $c = $_GET['cod'] ?? 0; //se o cod existir atribui a $c se não veio nada é 0
            $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='destalhes'>
            <?php
                if(!$busca){
                    echo "<tr><td>Busca falhou! $banco->error";
                } else {
                    if($busca->num_rows == 1){
                        $reg = $busca->fetch_object();
                        echo "<tr><td rowspan='3'>foto";
                        echo "<td>$reg->nome";
                        echo "<tr><td>$reg->descricao";
                        echo "<tr><td>Adm"; 
                    } else {
                        echo "<tr><td>Nenhum registro encontrado";
                    }
                }
                   
            ?>
        </table>
    </div>
</body>
</html>