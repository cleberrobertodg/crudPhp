<?php 
include("../validar.php");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.rtl.min.css" integrity="sha384-CfCrinSRH2IR6a4e6fy2q6ioOX7O6Mtm1L9vRvFZ1trBncWmMePhzvafv7oIcWiW" crossorigin="anonymous">
    <title>Alteração de Cadastro</title>
  </head>
  <body>

        <?php
            // Usar include_once e incluir o arquivo de funções
            include_once "conexao.php";
            include_once "funcoes.php";

            $id = $_GET['id'] ?? '';

            // CORREÇÃO: Usar prepared statements para buscar os dados com segurança
            $stmt = mysqli_prepare($conn, "SELECT * FROM pessoas WHERE cod_pessoa = ?");
            mysqli_stmt_bind_param($stmt, "i", $id); // 'i' para integer
            mysqli_stmt_execute($stmt);
            $dados = mysqli_stmt_get_result($stmt);
            $linha = mysqli_fetch_assoc($dados);

        ?>


    <div class="container">
        <div class="row">
            <div class="col">
                <h1>CRUD PHP</h1>
                <form action="edit_script.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome completo</label>
                        <input type="text" class="form-control" id="inputName" name="nome" required value="<?php echo $linha['nome']; ?>">  
                    </div>
                    <div class="mb-3">
                        <label for="endereco" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="inputAddress" name="endereco" required value="<?php echo $linha['endereco']; ?>">   
                    </div>
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="tel" class="form-control" id="inputPhone" name="telefone" required value="<?php echo $linha['telefone']; ?>">   
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="inputEmail1" name="email" required value="<?php echo $linha['email']; ?>">   
                    </div>
                    <div class="mb-3">
                        <label for="data_nascimento" class="form-label">Data de nascimento</label>
                        <input type="date" class="form-control" id="inputBorn" name="data_nascimento" required value="<?php echo $linha['data_nascimento']; ?>">   
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto (somente arquivos de até 1MB)</label>
                        <input type="file" class="form-control" id="inputPhoto" name="foto" accept="image/*">   
                    </div>
                    <div class="mb-3">
                        <?php
                            $foto = trim($linha['foto']);
                            $caminhoFoto = (!empty($foto) && file_exists("img/$foto")) 
                                ? "img/$foto" 
                                : "img/perfil.jpg";
                        ?>
                        <img id="imgPreview" src="<?php echo $caminhoFoto; ?>" alt="Pré-visualização da foto" style="max-width: 200px; max-height: 200px; border-radius: 10px; object-fit: cover;">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="Salvar alterações">
                        <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']; ?>">
                    </div>
                </form>
                <a href="index.php" class="btn btn-primary">Voltar a tela inicial</a></a>
            </div>
        </div>
    </div>






    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script>
        const inputPhoto = document.getElementById('inputPhoto');
        const imgPreview = document.getElementById('imgPreview');

        inputPhoto.onchange = evt => {
            const [file] = inputPhoto.files;
            if (file) {
                imgPreview.src = URL.createObjectURL(file);
            }
        };
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
  </body>
</html>