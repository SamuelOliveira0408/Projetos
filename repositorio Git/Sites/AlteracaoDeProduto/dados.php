<?php

        include("conexao.php");
        $nome_produto = $_POST["nome_produto"];
        $marca = $_POST["marca"];
        $qtd_estoque = $_POST["qtd_estoque"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $botao= $_POST["botao"];

        switch($botao)
        {
            case "Enviar":
                mysqli_query($conexao,"INSERT INTO produtos (idProduto, nome_produto, marca, qtd_estoque, preco, tipo, descricao) values ($idProduto, $nome_produto, $marca, $qtd_estoque, $preco, $tipo, $descricao");
            break;

            case "Exibir":
            $consulta=mysqli_query($conexao,"select * from produtos");
            echo "<h1>Produtos</h1>";
            while($dados=mysqli_fetch_array($consulta))
            {
                echo $dados["idProduto"]."<br>";
                echo $dados["nome_produto"]."<br>";
                echo $dados["marca"]."<br>";
                echo $dados["qtd_estoque"]."<br>";
                echo "<button onclick=window.location.href='excluir.php?id=",$dados["idProduto"],"'>excluir</button>";
                echo "<button onclick=window.location.href='alterar.php?id=",$dados["idProduto"],"'>alterar</button><br>";
                echo "<hr>";
                
            }
            echo "<button onclick=window.location.href='cadastroProd.php'>Voltar</a><br>";

            break;
        }
?>