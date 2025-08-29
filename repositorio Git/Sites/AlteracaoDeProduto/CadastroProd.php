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
        }
        .botao:hover {
            transform: scale(1.1);
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
        caption {
            font-size: 1.5em;
            margin: 10px;
            color: #008b8b;
        }
    </style>
</head>
<body>
    <img src="images.png" width="1902" height="30"><br><br><br>
    <form method="post" action="dados.php">
        <center>
            <h1><font size="15" color="#008b8b">Entrada de Dados</font></h1><br>
            <font size="5" color="white">
                Insira o nome do produto:<br>
                <input type="text" name="nome_produto"><br><br>
                Insira a marca:<br>
                <input type="text" name="marca"><br><br>
                Insira a quantidade em estoque:<br>
                <input type="number" name="qtd_estoque"><br><br>
                Insira o preço:<br>
                <input type="text" name="preco"><br><br>
                Insira o tipo do produto:<br>
                <input type="text" name="tipo"><br><br>
                Insira a descrição:<br>
                <input type="text" name="descricao"><br><br>
           
                <input type="submit" name="botao" value="Enviar">
		        <input type="submit" name="botao" value="Exibir">

            <br><br>
        </center>
    </form>

    
    <!-- Conexão ao banco de dados
    $sql = mysqli_connect("localhost", "root", "", "produtos");
    if (!$sql) {
        die("Conexão falhou: " . mysqli_connect_error());
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $acao = $_POST["acao"];
        $nome_produto = $_POST["nome_produto"];
        $marca = $_POST["marca"];
        $qtd_estoque = $_POST["qtd_estoque"];
        $preco = $_POST["preco"];
        $tipo = $_POST["tipo"];
        $descricao = $_POST["descricao"];
        $id_produto = $_POST["id_produto"];

        if ($acao == "Enviar") {
            $stmt = $sql->prepare("INSERT INTO produtos (nome_produto, marca, qtd_estoque, preco, tipo, descricao) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssisss", $nome_produto, $marca, $qtd_estoque, $preco, $tipo, $descricao);
            $stmt->execute();
            $stmt->close();
            echo "<center><p style='color: white;'>Produto cadastrado com sucesso!</p></center>";
        } elseif ($acao == "Consultar") {
            $stmt = $sql->prepare("SELECT * FROM produtos WHERE idProduto=?");
            $stmt->bind_param("i", $id_produto);
            $stmt->execute();
            $resultado = $stmt->get_result();
            if ($resultado->num_rows > 0) {
                echo "<center><table><tr><th>Nome do Produto</th><th>Marca</th><th>Quantidade</th><th>Preço</th><th>Tipo</th><th>Descrição</th></tr>";
                $linha = $resultado->fetch_assoc();
                echo "<tr><td>{$linha['nome_produto']}</td><td>{$linha['marca']}</td><td>{$linha['qtd_estoque']}</td><td>{$linha['preco']}</td><td>{$linha['tipo']}</td><td>{$linha['descricao']}</td></tr>";
                echo "</table></center>";
            } else {
                echo "<center><p style='color: white;'>Nenhum dado encontrado com o ID informado.</p></center>";
            }
            $stmt->close();
        } elseif ($acao == "Excluir") {
            $stmt = $sql->prepare("DELETE FROM produtos WHERE idProduto=?");
            $stmt->bind_param("i", $id_produto);
            if ($stmt->execute()) {
                echo "<center><p style='color: white;'>Produto excluído com sucesso.</p></center>";
            } else {
                echo "<center><p style='color: white;'>Erro ao excluir produto.</p></center>";
            }
            $stmt->close();
        } elseif ($acao == "Listar") {
            $resultado = mysqli_query($sql, "SELECT * FROM produtos");
            if (mysqli_num_rows($resultado) > 0) {
                echo "<center><table><tr><th>Nome do Produto</th><th>Marca</th><th>Quantidade</th><th>Preço</th><th>Tipo</th><th>Descrição</th></tr>";
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<tr><td>{$linha['idProduto']} - {$linha['nome_produto']}</td><td>{$linha['marca']}</td><td>{$linha['qtd_estoque']}</td><td>{$linha['preco']}</td><td>{$linha['tipo']}</td><td>{$linha['descricao']}</td></tr>";
                }
                echo "</table></center>";
            } else {
                echo "<center><p style='color: white;'>Nenhum dado encontrado.</p></center>";
            }
        }
    }
    

    mysqli_close($sql);
    -->


    <!-- FOOTER -->
    <footer class="container">
        <font color="#DCDCDC"><p>&copy; Por Matheus Victor e Sofia Pintor &middot;</p></font>
    </footer>
</body>
</html>
