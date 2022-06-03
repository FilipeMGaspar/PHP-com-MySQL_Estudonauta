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
    <title>Edição de dados do utilizador </title>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";
    ?>
    <div id="corpo">
        <?php
            if(!is_logado()){
                echo msg_erro("Efetue <a href='user-login.php'>login</a>, para poder editar dados!");
            } else {
                if(!isset($_POST['usuario'])){
                    include "user-edit-form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $tipo = $_POST['tipo'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;

                    $q = "UPDATE usuarios SET  usuario = '$usuario', nome = '$nome'";

                    if(empty($senha1) || is_null($senha)){
                        echo msg_aviso("A Password foi mantida!");
                    } else {
                        if($senha1 === $senha2) {
                            $senha = gerarHash($senha1);
                            $q .= ", senha='$senha'";
                            logout();
                            echo msg_aviso("Por favor, efectue novo <a href='login.php'>login</a>!");
                        } else {
                            echo msg_erro("As passwords não conferem!");
                            echo msg_erro(" Password anterior foi mantida!");
                        }
                    }

                    $q .= " where usuario= '" . $_SESSION['user'] . "'";

                   if($banco->query($q)){
                        echo msg_sucesso("Dados alterados com sucesso.");
                   } else {
                       echo msg_erro("Não foi possivel alterar os dados!");
                   }
                }
            }
        ?>
        <?php echo voltar(); ?>
    </div>
    <?php require_once "rodape.php"; ?>
</body>
</html>