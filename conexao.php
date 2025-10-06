<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $bd = "empresa";

   $conn = mysqli_connect($server, $user, $pass, $bd);

   if($conn){
       echo "Conectado com sucesso";
    } else {
       echo "Erro ao conectar: "; 
    }
?>