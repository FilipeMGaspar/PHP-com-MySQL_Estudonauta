<?php
        function thumb($arq){
            $caminho = "fotos/$arq";
            if(is_null($arq) || !file_exists($caminho)){ //Se for nulo ou o arquivo não existir
                return "fotos/indisponivel.png";
            } else {
                return $caminho;
            }
        }

        function voltar(){
            return "<span class='material-symbols-outlined'>keyboard_double_arrow_left</span>";
        }

        function msg_sucesso($msg) {
            $resp = "<div class='sucesso'><i class='material-icons'>check_circle</i>$msg</div>";
            return $resp;
        }

        function msg_aviso ($msg){

        }

        function msg_erro($msg) {

        }

    ?>