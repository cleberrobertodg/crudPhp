<?php
    function mensagem($texto, $tipo){
        echo "<div class='alert alert-$tipo' role='alert'>
                $texto
            </div>";
    }
// Função para organizar a exibição da data para o formato dd/mm/aaaa
  function mostraData($data_nascimento){
        $data = explode('-', $data_nascimento);
        $dia = $data[2];
        $mes = $data[1];
        $ano = $data[0];
        return $dia . "/" . $mes . "/" . $ano;
    }

// Função para mover a foto enviada para a pasta img
    function moverFoto($arrayFoto){
    $arrayTipo = explode("/", $arrayFoto['type']);
    $tipo = $arrayTipo[0] ?? '';
    $extensao = $arrayTipo[1] ?? '';

    // Verifica se foto é menor que 1MB e se não houve erro no upload
    if ($arrayFoto['size'] <= 1000000 && $arrayFoto['error'] == 0 && $tipo == 'image') {

        $nome_arquivo = date('YmdHis') . "$extensao";
        $destino = "img/" . $nome_arquivo;

        // Move o arquivo temporário para a pasta final
        if (move_uploaded_file($arrayFoto['tmp_name'], $destino)) {
            return $nome_arquivo;
        } else {
            return "erro";
        }

    } else {
        return "Imagem padrão";
    }
}

?>