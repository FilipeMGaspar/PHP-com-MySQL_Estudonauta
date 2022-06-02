<?php
    $q = "SELECT usuario, nome, senha, tipo FROM usuarios WHERE usuario='" . $_SESSION['user']."'";
    $busca = $banco->query($q);
    $reg = $busca->fetch_object();
?>

<h1>Alteração de dados</h1>
<form action="user-edit.php" method="post">
    <table>
        <tr><td>Utilizador</td><td><input type="text" name="usuario" id="usuario" size="10" maxlength="10"></td></tr>
        <tr><td>Nome</td><td><input type="text" name="nome" id="nome" size="30" maxlength="30"></td></tr>
        <tr><td>Tipo</td><td><input type="text" name="tipo" id="tipo" readonly></td></tr>
        <tr><td>Password</td><td><input type="password" name="senha1" id="senha1" maxlength="10" size="10"></td></tr>
        <tr><td>Confirme a password</td><td><input type="password" name="senha2" id="senha2" maxlength="10" size="10"></td></tr>
        <tr><td><input type="submit" value="Guardar"></td></tr>
    </table>
</form>