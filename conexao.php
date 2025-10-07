<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "empresa";

   $conn = mysqli_connect($server, $user, $pass, $bd);

   // É uma boa prática verificar a conexão e parar a execução se falhar.
   if (!$conn) {
       die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }

    function mostraData($data_nascimento){
        $data = explode('-', $data_nascimento);
        $dia = $data[2];
        $mes = $data[1];
        $ano = $data[0];
        return $dia . "/" . $mes . "/" . $ano;
    }
?>