<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css" integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">

    <title>Pesquisar</title>
  </head>
  <body>

    <?php 
        
            $pesquisa = $_POST['busca'] ?? '';
        

            include "conexao.php";

            $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

            $dados = mysqli_query($conn, $sql);

            while ($linha = mysqli_fetch_assoc($dados)){
                foreach($linha as $key => $value){
                    echo "$key: $value<br>";
                }
                echo "<hr>";
            }    

    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>

                    <nav class="navbar navbar-light bg-light">
                        <form class="form-inline" action="pesquisa.php" method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="busca">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                        </form>
                    </nav>


                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Nome completo</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de nascimento
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Nome</th>
                                <td>Rua X</td>
                                <td>11 911111111</td>
                                <td>@teste@teste.com.br</td>
                                <td>07/09/1990</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>Thornton</td>
                                
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td>Thornton</td>
                                
                            </tr>
                        </tbody>
                    </table>
                
                <a href="index.php" class="btn btn-primary">Voltar a tela inicial</a></a>
            </div>
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