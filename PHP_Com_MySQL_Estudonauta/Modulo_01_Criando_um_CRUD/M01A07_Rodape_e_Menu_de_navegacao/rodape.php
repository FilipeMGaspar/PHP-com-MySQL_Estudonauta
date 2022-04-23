<?php
require_once "includes/banco.php";
    echo "<footer>";
    echo "<p>Acessado por " . $_SERVER['REMOTE_ADDR'] . " em " . "</p>";
    echo "<p>Desenvolvido por Estudonauta &copy; 2022</p>";
    echo "</footer>";

    $banco->close(); //Fecho da ligação á base de dados