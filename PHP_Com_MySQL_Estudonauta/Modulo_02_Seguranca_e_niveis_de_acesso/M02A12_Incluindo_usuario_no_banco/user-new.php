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
    <title>Gestão de Utilizadores</title>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";
    ?>
    <div id="corpo">
        <?php
           if(!is_admin()){
                echo msg_erro("Área restrita! Não é administrador!");
                echo voltar();
           } else {
                if(!isset($_POST['usuario'])){
                    require "user-new-form.php";
                } else {
                    $usuario = $_POST['usuario'] ?? null;
                    $nome = $_POST['nome'] ?? null;
                    $senha1 = $_POST['senha1'] ?? null;
                    $senha2 = $_POST['senha2'] ?? null;
                    $tipo = $_POST['tipo'] ??  null;

                    if($senha1 === $senha2){
                        if(empty($usuario) || empty($nome) || empty($senha1) || empty($senha2) || empty($tipo)){
                            echo msg_erro("Todos os dados são obrigatórios");
                        } else {
                            $senha = gerarHash($senha1);
                            $q = "INSERT INTO usuarios (usuario, nome, senha, tipo) VALUES ('$usuario', '$nome', '$senha', '$tipo')";
                        }
                    } else {
                        echo msg_erro("As Passwords devem ser coincidir!") . "<br>";
                        echo msg_erro("Por favor, repita o procedimento!");
                    }
                }
           }
           echo voltar();
        ?>
    </div>
</body>
</html>