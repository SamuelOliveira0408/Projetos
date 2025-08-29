<?php
include("conexao.php");
$id = $_GET["id"];
$consulta = mysqli_query($conexao, "SELECT * FROM produtos WHERE idProduto = '$id'");
$dados = mysqli_fetch_array($consulta);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Alterar Produto</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>

<body class="bg-body-secondary">
    <center>
    <div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
        <div class="modal-dialog" role="document">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header p-5 pb-4 border-bottom-0">
                    <h1 class="fw-bold mb-0 fs-2">Preencha com as informações</h1>
                </div>
                <div class="modal-body p-5 pt-0">
                    <!-- Formulário para alterar produto -->
                    <form method="POST" action="gravar.php">
                        <div class="form-floating mb-3">
                            <label>ID</label><br>
                            <input type="text" name="id" readonly value="<?php echo $dados['idProduto']; ?>" class="form-control"><br><br>
                        </div>
                        
                        <div class="form-floating mb-3">
                            <label>Nome:</label><br>
                            <input type="text" name="nome" value="<?php echo $dados['nome_produto']; ?>" class="form-control"><br><br>
                        </div>

                        <div class="form-floating mb-3">
                            <label>Marca:</label><br>
                            <input type="text" name="marca" value="<?php echo $dados['marca']; ?>" class="form-control"><br><br>
                        </div>

                        <div class="form-floating mb-3">
                            <label>Estoque:</label><br>
                            <input type="text" name="estoque" value="<?php echo $dados['qtd_estoque']; ?>" class="form-control"><br><br>
                        </div>

                        <div class="form-floating mb-3">
                            <label>Preço:</label><br>
                            <input type="text" name="preco" value="<?php echo $dados['preco']; ?>" class="form-control"><br><br>
                        </div>

                        <div class="form-floating mb-3">
                            <label>Descrição:</label><br>
                            <input type="text" name="descricao" value="<?php echo $dados['descricao']; ?>" class="form-control"><br><br>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="pt-5 my-5 border-top">
        <p class="rodape">Desenvolvido por Samuel e Vinicius; 2024</p>
    </footer>
    </center>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
