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
                            <form method="post" action="dados.php">
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
                                
                            
                                <input type="submit" name="botao" class="botao" value="Enviar">
                                <input type="submit" name="botao" class="botao" value="Exibir">

                            </center>
                            </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>   
    <center> 
        <footer class="pt-5 my-5 border-top fixed-bottom">
            <p class="rodape">Desenvolvido por Samuel e Vinicius; 2024</p>
        </footer>
    </center>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

