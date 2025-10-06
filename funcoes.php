<?php
    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
                $texto
            </div>";
    }
?>