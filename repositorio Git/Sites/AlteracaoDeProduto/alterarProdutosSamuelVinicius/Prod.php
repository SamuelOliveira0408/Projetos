<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="x-icon" href="ico.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Cadastro Produtos - PHP/SQL</title>
    <style>
        body {
            background-color: #363636;
        }
        .botao {
            border: solid 1px #008b8b;
            border-radius: 20px;
            color: white;
            background-color: #008b8b;
            transition: background-color 0.5s ease, transform 0.5s ease;
            margin-left: 10px;
        }
        .botao:hover {
            transform: scale(1.1);
        }
        .containerr {
            max-width: 800px; 
            margin: 0 auto;
            padding: 20px; 
            background-color: #2a2a2a;
            border-radius: 10px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }
        input[type="text"], input[type="number"] {
            font-size: 14px; 
            width: 62%;
            margin-bottom: 12px;
        }
        h1 {
            font-size: 24px; 
            color: #008b8b; 
        }
        p {
            color: white; 
        }
        
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            color: white;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #008b8b;
        }
        th {
            background-color: #008b8b;
        }
        tr {
            background-color: #212121;
        }
        #result {
            margin-top: 20px;
            color: white;
        }
    </style>
    <script>
        function searchProducts() {
            const query = document.getElementById('id_produto').value;

            if (query.length < 1) {
                document.getElementById('result').innerHTML = '';
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("GET", "search.php?q=" + encodeURIComponent(query), true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('result').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>
</head>
<body><br><br>
<div class="containerr">
    <form method="post">
        <center>
            <h1><font size="15" color="#008b8b">Entrada de Dados</font></h1><br>
            <font size="4" color="white">
                Insira o nome do produto:<br>
                <input type="text" name="nome_produto"><br>
                Insira a marca:<br>
                <input type="text" name="marca"><br>
                Insira a quantidade em estoque:<br>
                <input type="number" name="qtd_estoque"><br>
                Insira o preço:<br>
                <input type="text" name="preco"><br>
                Insira o tipo do produto:<br>
                <input type="text" name="tipo"><br>
                Insira a descrição:<br>
                <input type="text" name="descricao"><br>
                <button type="submit" class="botao" name="acao" value="Enviar">Enviar</button><br><br>
            
                <br> Insira o nome do produto ou ID do produto para consulta:<br>
                <input type="text" id="id_produto" name="id_produto" onkeyup="searchProducts()"><br>
            <button type="submit" class="botao" name="acao" value="Consultar">Consultar</button>
            <button type="submit" class="botao" name="acao" value="Listar">Listar</button>
            <br><br>
        </center>
    </form>
    <div id="result"></div>
</div><br><br>
<?php
// Conexão ao banco de dados
$sql = mysqli_connect("localhost", "root", "", "produtos");
if (!$sql) {
    die("Conexão falhou: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    @$acao = $_POST["acao"];
    @$nome_produto = $_POST["nome_produto"];
    @$marca = $_POST["marca"];
    @$qtd_estoque = $_POST["qtd_estoque"];
    @$preco = $_POST["preco"];
    @$tipo = $_POST["tipo"];
    @$descricao = $_POST["descricao"];
    @$id_produto = $_POST["id_produto"];

    if (@$acao == "Enviar") {
        $stmt = $sql->prepare("INSERT INTO produtos (nome_produto, marca, qtd_estoque, preco, tipo, descricao) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisss", $nome_produto, $marca, $qtd_estoque, $preco, $tipo, $descricao);
        $stmt->execute();
        $stmt->close();
        echo "<center><p style='color: white;'>Produto cadastrado com sucesso!</p></center>";
    } elseif (@$acao == "Consultar") {
        $stmt = $sql->prepare("SELECT * FROM produtos WHERE idProduto=?");
        $stmt->bind_param("i", $id_produto);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            echo "<center><table><tr><th>Nome do Produto</th><th>Marca</th><th>Quantidade</th><th>Preço</th><th>Tipo</th><th>Descrição</th><th>Ações</th></tr>";
            $linha = $resultado->fetch_assoc();
            echo "<tr><td>{$linha['nome_produto']}</td><td>{$linha['marca']}</td><td>{$linha['qtd_estoque']}</td><td>{$linha['preco']}</td><td>{$linha['tipo']}</td><td>{$linha['descricao']}</td>
                <td>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='id_produto' value='{$linha['idProduto']}'>
                        <button type='submit' class='botao' name='acao' value='Excluir'>Excluir</button>
                    </form>
                    <form method='post' style='display:inline;'>
                        <input type='hidden' name='id_produto' value='{$linha['idProduto']}'>
                        <button type='submit' class='botao' name='acao' value='Alterar'>Alterar</button>
                    </form>
                </td></tr>";
            echo "</table></center>";
        } else {
            echo "<center><p style='color: white;'>Nenhum dado encontrado com o ID informado.</p></center>";
        }
        $stmt->close();
    } elseif (@$acao == "Excluir") {
        $stmt = $sql->prepare("DELETE FROM produtos WHERE idProduto=?");
        $stmt->bind_param("i", $id_produto);
        if ($stmt->execute()) {
            echo "<center><p style='color: white;'>Produto excluído com sucesso.</p></center>";
        } else {
            echo "<center><p style='color: white;'>Erro ao excluir produto.</p></center>";
        }
        $stmt->close();
    } elseif (@$acao == "Listar") {
        $resultado = mysqli_query($sql, "SELECT * FROM produtos");
        if (mysqli_num_rows($resultado) > 0) {
            echo "<center><table><tr><th>Nome do Produto</th><th>Marca</th><th>Quantidade</th><th>Preço</th><th>Tipo</th><th>Descrição</th><th>Ações</th></tr>";
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr><td>{$linha['idProduto']} - {$linha['nome_produto']}</td><td>{$linha['marca']}</td><td>{$linha['qtd_estoque']}</td><td>{$linha['preco']}</td><td>{$linha['tipo']}</td><td>{$linha['descricao']}</td>
                    <td>
                        <form method='post' style='display:inline;'>
                            <input type='hidden' name='id_produto' value='{$linha['idProduto']}'>
                            <button type='submit' class='botao' name='acao' value='Excluir'>Excluir</button>
                        </form>
                        <form method='post' style='display:inline;'>
                            <input type='hidden' name='id_produto' value='{$linha['idProduto']}'>
                            <button type='submit' class='botao' name='acao' value='Alterar'>Alterar</button>
                        </form>
                    </td></tr>";
            }
            echo "</table></center>";
        } else {
            echo "<center><p style='color: white;'>Nenhum produto encontrado.</p></center>";
        }
    } elseif (@$acao == "Alterar") {
        $stmt = $sql->prepare("SELECT * FROM produtos WHERE idProduto=?");
        $stmt->bind_param("i", $id_produto);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($resultado->num_rows > 0) {
            $produto = $resultado->fetch_assoc();
            echo "<center>
                <form method='post' style='max-width: 400px;'>
                    <h1>Alterar Produto</h1>
                    <div style='display: flex; flex-direction: column; gap: 5px;'>
                        <label for='nome_produto'>Nome do Produto:</label>
                        <input type='text' name='nome_produto' id='nome_produto' value='{$produto['nome_produto']}' style='font-size: 12px; padding: 5px; width: 100%;'>
                        
                        <label for='marca'>Marca:</label>
                        <input type='text' name='marca' id='marca' value='{$produto['marca']}' style='font-size: 12px; padding: 5px; width: 100%;'>
                        
                        <label for='qtd_estoque'>Quantidade em Estoque:</label>
                        <input type='number' name='qtd_estoque' id='qtd_estoque' value='{$produto['qtd_estoque']}' style='font-size: 12px; padding: 5px; width: 100%;'>
                        
                        <label for='preco'>Preço:</label>
                        <input type='text' name='preco' id='preco' value='{$produto['preco']}' style='font-size: 12px; padding: 5px; width: 100%;'>
                        
                        <label for='tipo'>Tipo:</label>
                        <input type='text' name='tipo' id='tipo' value='{$produto['tipo']}' style='font-size: 12px; padding: 5px; width: 100%;'>
                        
                        <label for='descricao'>Descrição:</label>
                        <input type='text' name='descricao' id='descricao' value='{$produto['descricao']}' style='font-size: 12px; padding: 5px; width: 100%;'>
                        
                        <input type='hidden' name='id_produto' value='{$produto['idProduto']}'>
                        <button type='submit' class='botao' name='acao' value='Salvar'>Salvar</button>
                    </div>
                </form>
            </center>";
        }
        $stmt->close();
    }
     elseif (@$acao == "Salvar") {
        $stmt = $sql->prepare("UPDATE produtos SET nome_produto=?, marca=?, qtd_estoque=?, preco=?, tipo=?, descricao=? WHERE idProduto=?");
        $stmt->bind_param("ssisssi", $nome_produto, $marca, $qtd_estoque, $preco, $tipo, $descricao, $id_produto);
        if ($stmt->execute()) {
            echo "<center><p style='color: white;'>Produto atualizado com sucesso!</p></center>";
        } else {
            echo "<center><p style='color: white;'>Erro ao atualizar produto.</p></center>";
        }
        $stmt->close();
    }
}

mysqli_close($sql);
?>

<!-- FOOTER -->
<center>
    <footer class="container">
        <font color="#DCDCDC"><p>&copy; Por Matheus Victor e Sofia Pintor &middot;</p></font>
    </footer></center>
</body>
</html>
