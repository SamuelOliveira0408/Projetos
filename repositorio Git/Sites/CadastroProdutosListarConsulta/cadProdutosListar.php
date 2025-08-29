<!--Samuel e Vinicius 2°D-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produtos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <meta name="theme-color" content="#712cf9">
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

                    <!--forms-->
                        <form method="post" action="">
                            <div class="form-floating mb-3">
                                <input type="text" name="nome_produto" class="form-control rounded-3" id="floatingInput" placeholder="Nome do Produto">
                                <label for="floatingInput">Nome do Produto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="marca" class="form-control rounded-3" id="floatingInput" placeholder="Marca do Produto">
                                <label for="floatingInput">Marca do Produto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="qtd_estoque" class="form-control rounded-3" id="floatingInput" placeholder="Quantidade em Estoque">
                                <label for="floatingInput">Quantidade em Estoque</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="preco" class="form-control rounded-3" id="floatingInput" placeholder="Preço do Produto">
                                <label for="floatingInput">Preço do Produto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="tipo" class="form-control rounded-3" id="floatingInput" placeholder="Tipo de Produto">
                                <label for="floatingInput">Tipo de Produto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="descricao" class="form-control rounded-3" id="floatingPassword" placeholder="Descrição do Produto">
                                <label for="floatingPassword">Descrição do Produto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="id_produto" class="form-control rounded-3" id="floatingPassword" placeholder="ID do Produto">
                                <label for="floatingPassword">Insira o ID para consulta ou exclusão:</label>
                            </div>

                            
                            <button type="submit" class="btn btn-primary botao" name="acao" value="Consultar">Consultar</button>
                            <button type="submit" class="btn btn-primary botao" name="acao" value="Excluir">Excluir</button>
                            <button type="submit" class="btn btn-primary botao" name="acao" value="Listar">Listar</button><br>
                            <br>
                            <button type="submit" class="btn btn-primary botao" name="acao" value="Enviar">Enviar</button>
                        </form>
                    </div>
                </div>
            </div>
        
            <?php
        //conectar com o banco de dados
        $sql = mysqli_connect("localhost", "root", "", "produtos");

        //verifica se o form foi enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //acao selecionada no forms
            $acao = $_POST["acao"];
            //dados do forms
            $nome_produto = $_POST["nome_produto"];
            $marca = $_POST["marca"];
            $qtd_estoque = $_POST["qtd_estoque"];
            $preco = $_POST["preco"];
            $tipo = $_POST["tipo"];
            $descricao = $_POST["descricao"];
            $id_produto = $_POST["id_produto"];

            //enviar forms
        if ($acao == "Enviar") {
            //consulta SQL para evitar injeção de SQL
            $stmt = $sql->prepare("INSERT INTO produtos (nome_produto, marca, qtd_estoque, preco, tipo, descricao) VALUES (?, ?, ?, ?, ?, ?)");
            //vincula parametros da consulta
            $stmt->bind_param("ssisss", $nome_produto, $marca, $qtd_estoque, $preco, $tipo, $descricao);
            $stmt->execute();
            $stmt->close();
            echo "<script>alert('Produto cadastrado com sucesso!');</script>";

            } 
            //consulta do forms
            elseif ($acao == "Consultar") {
                //consulta SQL para achar ID
                $stmt = $sql->prepare("SELECT * FROM produtos WHERE idProduto=?");
                //vincula o ID como parâmetro
                $stmt->bind_param("i", $id_produto);
                $stmt->execute();
                //conseguir resultado
                $resultado = $stmt->get_result();
                //ve se o id foi encontrado
                if ($resultado->num_rows > 0) {
                    $linha = $resultado->fetch_assoc();
                    //coloca os dados numa tabela
                    echo '<center><table class="table mt-5">';
                    echo "<tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Marca</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Tipo</th>
                            <th>Descrição</th>
                        </tr>";
                    echo "<tr>
                            <td>{$linha['idProduto']}</td>
                            <td>{$linha['nome_produto']}</td>
                            <td>{$linha['marca']}</td>
                            <td>{$linha['qtd_estoque']}</td>
                            <td>{$linha['preco']}</td>
                            <td>{$linha['tipo']}</td>
                            <td>{$linha['descricao']}</td>
                         </tr>";

                    echo "</table></center>";
                } else {
                    //caro de erro
                    echo "<script>alert('Nenhum item encontrado');</script>";
                }
                $stmt->close();
            } 
            //exclusao do forms
            elseif ($acao == "Excluir") {
                //consulta SQL para excluir o produto pelo ID
                $stmt = $sql->prepare("DELETE FROM produtos WHERE idProduto=?");
                //vincula o ID do produto como parâmetro
                $stmt->bind_param("i", $id_produto);
                //faz a consulta e ve o resultado
                if ($stmt->execute()) {
                    //suceso
                    echo "<script>alert('Item excluído');</script>";
                } else {
                    //erro
                    echo "<script>alert('Erro ao excluir');</script>";
                }
                $stmt->close();
            } 
            //listar o forms
            elseif ($acao == "Listar") {
                //consulta pde todos os pordutos
                $resultado = mysqli_query($sql, "SELECT * FROM produtos");
                //ve se ha produtos na tabela
                if (mysqli_num_rows($resultado) > 0) {
                    //imprime na tabela
                    echo '<center><table class="table mt-5">';
                    echo '<thead>
                            <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Marca</th>
                            <th>Quantidade</th>
                            <th>Preço</th>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            </tr>
                            </thead>';

                    echo '<tbody>';
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo '<td>' . $row['idProduto'] . '</td>';
                        echo '<td>' . $row['nome_produto'] . '</td>';
                        echo '<td>' . $row['marca'] . '</td>';
                        echo '<td>' . $row['qtd_estoque'] . '</td>';
                        echo '<td>' . $row['preco'] . '</td>';
                        echo '<td>' . $row['tipo'] . '</td>';
                        echo '<td>' . $row['descricao'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</tbody></table></center>';
                } else {
                    //mensagem de erro
                    echo "<script>alert('Nenhum produto cadastrado');</script>";
                }
            }
        }
        ?>
        </div>

        <footer class="pt-5 my-5 border-top">
            <p class="rodape">Desenvolvido por Samuel e Vinicius; 2024</p>
        </footer>
    </center>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

