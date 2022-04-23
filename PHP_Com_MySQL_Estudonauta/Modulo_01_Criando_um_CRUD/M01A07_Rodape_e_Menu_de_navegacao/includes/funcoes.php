<?php
        function thumb($arq){
            $caminho = "fotos/$arq";
            if(is_null($arq) || !file_exists($caminho)){ //Se for nulo ou o arquivo não existir
                return "fotos/indisponivel.png";
            } else {
                return $caminho;
            }
        }
    ?>