<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produtos</title>
    
    
    <script src="js/jquery-2.1.4.min.js"></script>  
    <script src="js1.js"></script> 
    <script src="js2.js"> </script>
    
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" type="text/css" media="all"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
            width: 70vh;
            margin-bottom: 20px;
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
                    <form name="frmjquery" method="post" action="">
                            <div class="form-floating mb-3">
                                <input type="text" name="nome_produto" class="form-control rounded-3" id="floatingInput" placeholder="Nome do Produto">
                                <label for="floatingInput">Nome do Produto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="marca" class="form-control rounded-3" id="floatingInput" placeholder="Marca do Produto">
                                <label for="floatingInput">Marca do Produto</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="qtd_estoque" id="txtQtde" class="txtQtde form-control rounded-3"  value="" placeholder="Quantidade">
                                <label for="floatingInput">Quantidade do produto</label> 
                                
                            </div>
                            <div class="form-floating mb-3">
                            <input type="text" name="preco" id="txtQtde" class="txtQtde form-control rounded-3"  value="" placeholder="preco">
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

                                <h1 class="fw-bold mb-0 fs-2">Busca de Produtos</h1>
                                <br>
                                <input type="text" id="search" placeholder="Buscar por nome" onkeyup="buscarProdutos()">
                                  
                            </div>
                         
                            <button type="submit" class="giro" bg = "primary-color" name="acao" value="Enviar">Enviar</button>
                            <button type="submit" class="giro" name="acao" value="Listar">Listar</button>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <center>
        <div id="resultado">Digite um nome para buscar...</div>
        </center>

        <script>
            function buscarProdutos() {
                const searchValue = document.getElementById('search').value;

                if (searchValue.length < 1) {
                    document.getElementById('resultado').innerHTML = 'Digite um nome para buscar...';
                    return;
                }

                const xhr = new XMLHttpRequest();
                xhr.open('GET', 'search.php?search=' + encodeURIComponent(searchValue), true);

                xhr.onload = function() {
                    if (this.status === 200) {
                        const produtos = JSON.parse(this.responseText);
                        let output = '<h2>Produtos Encontrados</h2><ul>';

                        if (produtos.length === 0) {
                            output += '<li>Nenhum produto encontrado.</li>';
                        } else {
                            produtos.forEach(function(produto) {
                                output += `
                                <table class="table table-striped table-bordered mt-3">
                                <tr>
                                    <th>Nome do Produto</th>
                                    <th>Marca</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Tipo</th>
                                    <th>Descrição</th>
                                    <th>Exclusão</th>
                                </tr>
                                <tr>
                                    <td>${produto.nome_produto}</td>
                                    <td>${produto.marca}</td>
                                    <td>${produto.qtd_estoque}</td>
                                    <td>${produto.preco}</td>
                                    <td>${produto.tipo}</td>
                                    <td>${produto.descricao}</td>
                                    <td><button onclick="excluirProduto(${produto.idProduto})" class="btn btn-danger">Excluir</button></td>
                                </tr>
                                </table>
                                `;
                            });
                        }

                        document.getElementById('resultado').innerHTML = output;
                    }
                };

                xhr.send();
            }

            function excluirProduto(idProduto) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "delete.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                xhr.onload = function() {
                    if (this.status === 200) {
                        const response = JSON.parse(this.responseText);
                        if (response.status === 'success') {
                            alert(response.message);
                            buscarProdutos(); // Atualiza a lista de produtos
                        } else {
                            alert(response.message);
                        }
                    }
                };
                
                xhr.send("id=" + idProduto);
            }
        </script>
        <footer class="pt-5 my-5 border-top">
            <p class="rodape">Desenvolvido por Samuel e Vinicius; 2024</p>
        </footer>
    </center>

    <script src="js/bootstrap.bundle
