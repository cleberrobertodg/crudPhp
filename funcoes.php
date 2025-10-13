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

    function moverFoto($arrayFoto)
{
    // Verifica se foto é menor que 1MB e se não houve erro no upload
    if ($arrayFoto['size'] <= 1000000 &&$arrayFoto['error'] == 0) {

        $nome_arquivo = date('YmdHis') . ".jpg";
        $destino = "img/" . $nome_arquivo;

        // Move o arquivo temporário para a pasta final
        if (move_uploaded_file($arrayFoto['tmp_name'], $destino)) {
            return $nome_arquivo;
        } else {
            return "erro";
        }

    } else {
        return "Erro ao subir imagem!";
    }
}

?>