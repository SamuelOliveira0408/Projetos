<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <meta name="theme-color" content="#712cf9">
</head>
<body>
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

        .nav {
            background-color: #28eb49;
        }

        table {
            margin-top: 10vh;
            background-color: #d3d3d3;
            border-radius: 20px;
            width: 70vh; /* Ajuste na largura da tabela */
            margin-bottom: 20px; /* Espaçamento na parte inferior */
        }

        .bg-azul {
            background-color: #28eb49;
        }

        form {
            margin-top: 5vh;
        }

        .rodape {
            color: black;
        }

        a {
            color: white;
            text-decoration: none;
        }

        a:hover {
            color: #169b2c;
        }

        h3 {
            color: #00BFFF; 
        }

        .black {
            color: black;
        }

    </style>

    
<body class="bg-body-secondary">
</html>

<?php

include("conexao.php");

$botao = $_POST["botao"] ?? ''; // Usando ?? para evitar warning caso $botao não esteja definido

// Se o botão "Enviar" for pressionado, insere os dados
if ($botao === "Enviar") {
    $nome_produto = $_POST["nome_produto"];
    $marca = $_POST["marca"];
    $qtd_estoque = $_POST["qtd_estoque"];
    $preco = $_POST["preco"];
    $tipo = $_POST["tipo"];
    $descricao = $_POST["descricao"];

    mysqli_query(
        $conexao,
        "INSERT INTO produtos (nome_produto, marca, qtd_estoque, preco, tipo, descricao) 
        VALUES ('$nome_produto', '$marca', '$qtd_estoque', '$preco', '$tipo', '$descricao')"
    );

    echo "
            <div class='modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5'>
                <div class='modal-dialog'>
                    <div class='modal-content rounded-4 shadow'>
                        <div class='modal-header p-5 pb-4 border-bottom-0'>
                            <h1 class='fw-bold mb-0 fs-2'>Produto Cadastrado com sucesso!</h1>
                        </div>
                        <a href='cadProdutosListarAlterar.php' class='btn botao'>Voltar</a>
                    </div>
                </div>
            </div>";

} elseif ($botao === "Exibir") {
    // Exibindo os produtos cadastrados
    $consulta = mysqli_query($conexao, "SELECT * FROM produtos");

    echo "
            <div class='modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5'>
                <div class='modal-dialog'>
                    <div class='modal-content rounded-4 shadow'>
                        <div class='modal-header p-5 pb-4 border-bottom-0'>
                            <h1 class='fw-bold mb-0 fs-2'>Produtos Cadastrados</h1>
                        </div>
                        <div class='modal-body p-5 pt-0'>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Marca</th>
                                        <th>Estoque</th>
                                        <th>Preço</th>
                                        <th>Excluir/Alterar</th>
                                    </tr>
                                </thead>
                                <tbody>";

    while ($dados = mysqli_fetch_assoc($consulta)) {
        echo "
            <tr>
                <td>{$dados['idProduto']}</td>
                <td>{$dados['nome_produto']}</td>
                <td>{$dados['marca']}</td>
                <td>{$dados['qtd_estoque']}</td>
                <td>{$dados['preco']}</td>
                <td>
                    <a href='excluir.php?id={$dados['idProduto']}' class='btn botao'>Excluir</a>
                    <a href='alterar.php?id={$dados['idProduto']}' class='btn botao'>Alterar</a>
                </td>
            </tr>";
    }

    echo "      </tbody>
                        </table>
                            <a href='cadProdutosListarAlterar.php' class='btn botao'>Voltar</a>
                        </div>
                    </div>
                </div>
            </div>";
}

?>




<footer class="pt-3 bg-body-secondary border-top fixed-bottom">
    <p class="text-center mb-0">Desenvolvido por Samuel e Vinicius; 2024</p>
</footer>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
