<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="estilo/estilo.css">
    <!-- Icons do Google-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Detalhes do jogo</title>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";
    ?>
    <div id="corpo">
        <?php
            include_once "topo.php";
            $c = $_GET['cod'] ?? 0; //se o cod existir atribui a $c se não veio nada é 0
            $busca = $banco->query("select * from jogos where cod='$c'");
        ?>
        <h1>Detalhes do jogo</h1>
        <table class='detalhes'>
            <?php
                if(!$busca){
                    echo "<tr><td>Busca falhou! $banco->error";
                } else {
                    if($busca->num_rows == 1){
                        $reg = $busca->fetch_object();
                        $t = thumb($reg->capa);
                        echo "<tr><td rowspan='3'><img src='$t' class='full'/>";
                        echo "<td><h2>$reg->nome</h2>";
                        echo "Nota: ". number_format($reg->nota, 1) . "/10";
                        if(is_admin()){
                            echo " <span class='material-symbols-outlined'>add_circle</span> ";
                            echo "<span class='material-symbols-outlined'>edit</span> ";
                            echo "<span class='material-symbols-outlined'>delete</span> ";
                        } elseif (is_editor()){
                            echo " <span class='material-symbols-outlined'>edit</span>";
                        }
                        echo "<tr><td>$reg->descricao"; 
                    } else {
                        echo "<tr><td>Nenhum registro encontrado";
                    }
                }
                   
            ?>
        </table>
        <?php echo voltar();?></a>
    </div>
    <?php include_once "rodape.php";?>
</body>
</html>