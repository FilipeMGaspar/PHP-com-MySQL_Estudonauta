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
    <title>Tela de Login</title>
    <!-- Estilo pontual somente para esta página -->
    <style>
        div#corpo{
            width: 270px;
            font-size: 12pt;
        }
        table td {
            padding: 6px;
        }
    </style>
</head>
<body>
    <?php
        require_once "includes/banco.php";
        require_once "includes/funcoes.php";
        require_once "includes/login.php";
    ?>
    <div id="corpo">
        <?php
            $u = $_POST['usuario'] ?? null;
            $s = $_POST['senha'] ?? null;

            if(is_null($u) || is_null($s)){
                require "user-login-form.php";
            } else {
               $q = "SELECT usuario, nome, senha, tipo FROM usuarios where usuario = '$u' LIMIT 1";
               $busca = $banco->query($q);
               if(!$busca) {
                    echo msg_erro('Falha ao acessar o banco!');
               } else{
                   if($busca->num_rows > 0){
                    $reg = $busca->fetch_object();
                        if(testarHash($s, $reg->senha)){
                            echo msg_sucesso('Login efectuado com sucesso.');
                            $_SESSION['user'] =  $reg->usuario;
                            $_SESSION['nome'] = $reg->nome;
                            $_SESSION['tipo'] = $reg->tipo;
                        } else {
                            echo msg_erro('Password Inválida!');
                        }
                    } else {
                        echo msg_erro('Senha inválida!');
                    }
               }
            }

            echo voltar();
        ?>
    </div>
    <?php require_once "rodape.php" ?>
</body>
</html>