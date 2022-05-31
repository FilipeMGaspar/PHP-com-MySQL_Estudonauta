<h1>Novo Utilizador</h1>
<form action="user-new.php" method="post">
    <table>
        <tr><td>Utilizador</td><td><input type="text" name="usuario" id="usuario" size="10" maxlength="10"></td></tr>
        <tr><td>Nome</td><td><input type="text" name="nome" id="nome" size="30" maxlength="30"></td></tr>
        <tr><td>Tipo</td><td><select name="tipo" id="tipo">
            <option value="admin"> Administrador</option>
            <option value="editor" selected> Editor</option>
        </select></td></tr>
        <tr><td>Password</td><td><input type="password" name="senha1" id="senha1" size="10" maxlength="10"></td></tr>
        <tr><td>Confirme a Password</td><td><input type="password" name="senha2" id="senha2" size="10" maxlength="10"></td></tr>
    </table>

</form>