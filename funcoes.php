<?php
    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
                $texto
            </div>";
    }

  function mostraData($data_nascimento){
        $data = explode('-', $data_nascimento);
        $dia = $data[2];
        $mes = $data[1];
        $ano = $data[0];
        return $dia . "/" . $mes . "/" . $ano;
    }
?>