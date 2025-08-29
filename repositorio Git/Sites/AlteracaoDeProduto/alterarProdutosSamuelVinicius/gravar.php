<!DOCTYPE html>
<html>
<head>
	<title>Gravar</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="styles.css">
</head>

<style>
        .botao{
            border: solid 1px #00BFFF;
            border-radius: 5px;
            color: black;
            background-color: #00BFFF;
        }
        .botao:hover{
            background-color: #1E90FF;
        }
</style>  

<body class="bg-body-secondary">

<?php
include("conexao.php");

// Verificar se os dados do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar os dados do formulário
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $marca = $_POST['marca'];
    $estoque = $_POST['estoque'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];

    // Atualizar o produto no banco de dados
    $query = "UPDATE produtos SET nome_produto = '$nome', marca = '$marca', qtd_estoque = '$estoque', preco = '$preco', descricao = '$descricao' WHERE idProduto = '$id'";

    if (mysqli_query($conexao, $query)) {
        echo "
            <div class='modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5'>
                <div class='modal-dialog'>
                    <div class='modal-content rounded-4 shadow'>
                        <div class='modal-header p-5 pb-4 border-bottom-0'>
                            <h1 class='fw-bold mb-0 fs-2'>Produto modificado com sucesso!</h1>
                        </div>
                        <a href='cadProdutosListarAlterar.php' class='btn botao'>Voltar</a>
                    </div>
                </div>
            </div>";
    } else {
        echo "
        <div class='modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5'>
            <div class='modal-dialog'>
                <div class='modal-content rounded-4 shadow'>
                    <div class='modal-header p-5 pb-4 border-bottom-0'>
                        <h1 class='fw-bold mb-0 fs-2'>Erro de conexão :(</h1>
                    </div>
                    <a href='cadProdutosListarAlterar.php' class='btn botao'>Voltar</a>
                </div>
            </div>
        </div>" . mysqli_error($conexao) . "</p></center>";
    }
   
}
?>

<center>
<footer class="pt-5 my-5 border-top fixed-bottom">
        <p class="rodape">Desenvolvido por Samuel e Vinicius; 2024</p>
</footer>
</center>


<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
