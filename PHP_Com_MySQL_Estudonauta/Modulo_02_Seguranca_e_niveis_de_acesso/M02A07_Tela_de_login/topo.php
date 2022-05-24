<?php
    echo "<header>";
    if(empty($_SESSION['user'])){
        echo  "<a href='user-login.php'>Entrar</a>" .$_SESSION['nome']; 
    } else {
        echo "Olá, " . $_SESSION['nome'];
    }    
    echo "</header>";