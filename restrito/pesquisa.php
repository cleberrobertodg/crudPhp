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
            include_once "funcoes.php";

            $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

            $dados = mysqli_query($conn, $sql);   

    ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Pesquisar</h1>

                    <nav class="navbar navbar-light bg-light">
                        <form class="form-inline" action="pesquisa.php" method="post">
                            <input class="form-control mr-sm-2" type="search" placeholder="Nome" aria-label="Pesquisar" name="busca" autofocus>
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>
                        </form>
                    </nav>


                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome completo</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Data de nascimento</th>
                            <th scope="col">Funções</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                while ($linha = mysqli_fetch_assoc($dados)){
                                    $cod_pessoa = $linha['cod_pessoa'];
                                    $nome = $linha['nome'];
                                    $endereco = $linha['endereco'];
                                    $telefone = $linha['telefone'];
                                    $email = $linha['email'];
                                    $data_nascimento = $linha['data_nascimento'];   
                                    $data_nascimento = mostraData($data_nascimento);  
                                    $foto = trim($linha['foto']); // remove espaços em branco

                                    if ($foto != '' && file_exists("img/$foto")) {
                                        $mostraFoto = "<img src='img/$foto' style='width:70px; border-radius:70px;'>";
                                    } else {
                                        $mostraFoto = "<img src='img/perfil.jpg' style='width:70px; border-radius:70px;'>";
                                    }
                                    echo 
                                    "<tr>
                                        <th>$mostraFoto</th>
                                        <th scope='row'>$nome</th>
                                        <td>$endereco</td>
                                        <td>$telefone</td>
                                        <td>$email</td>
                                        <td>$data_nascimento</td>
                                        <td>
                                            <a href='cadastro_edit.php?id=$cod_pessoa' class='btn btn-success btn-sm'>Editar</a>
                                            <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma'
                                            onclick=".'"'."pegarDados($cod_pessoa, '$nome')".'"'.">Excluir</a>
                                        </td>
                                    </tr>";                                
                                }
                            ?>
                            
                        </tbody>
                    </table>
                
                <a href="index.php" class="btn btn-primary">Voltar a tela inicial</a></a>
            </div>
        </div>
    </div>

              <!-- Modal -->
<div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        <form action="excluir_script.php" method="POST">
        <p>Deseja realmente excluir <b id="nome_pessoa">Nome pessoa</b>?</p>
        
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="hidden" name="id" id="id_pessoa" value="">
            <input type="hidden" name="nome" id="nome" value="">
            <input type="submit" class="btn btn-danger" value ="Excluir">
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    function pegarDados(id, nome) {
        document.querySelector('#nome_pessoa').innerHTML = nome;
        document.querySelector('#id_pessoa').value = id;
    }
</script>


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