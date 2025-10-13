<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css" integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">

    <title>Exclusão de Cadastro</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <!-- PHP COMEÇA AQUI -->
            <?php

                include_once "conexao.php";
                include_once "funcoes.php";

                $id = $_POST['id'];
                $nome = $_POST['nome'];

                
                // Usando prepared statements para previnir SQL Injection no DELETE
                $stmt = mysqli_prepare($conn, "DELETE from`pessoas` WHERE `cod_pessoa` = ?");
                mysqli_stmt_bind_param($stmt, "i", $id);
 
                if (mysqli_stmt_execute($stmt)) {
                     mensagem("$nome excluído com sucesso!", 'success');
                } else {
                     mensagem("$nome sofreu erro ao realizar exclusão! " . mysqli_error($conn), 'danger'); 
                }
 
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
 
            ?>
            <!-- PHP TERMINA AQUI -->

            <hr>
            <a href="index.php" class="btn btn-primary">Voltar</a>
        </div>
    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
  </body>
</html>
