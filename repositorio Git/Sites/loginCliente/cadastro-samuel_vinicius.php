<!--Samuel e Vinicius 2d-->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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

        font {
            color: #28eb49;
        }

        table {
            margin-top: 10vh;
            background-color: #d3d3d3;
            border-radius: 20px;
            box-shadow: 5px 10px;
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


    </style>

</head>

<body>

<center>
<div class="modal modal-sheet position-static d-block bg-body-secondary p-4 py-md-5" tabindex="-1" role="dialog" id="modalSignin">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-4 shadow">
        <div class="modal-header p-5 pb-4 border-bottom-0">
            <h1 class="fw-bold mb-0 fs-2">Preencha com as informações</h1>
            
        </div>

        <div class="modal-body p-5 pt-0">
            <form class="" method = "post" action>
            <div class="form-floating mb-3">
                <input type = "text" name = "nome" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Nome</label>
            </div>
            <div class="form-floating mb-3">
                <input type = "text" name = "login" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Login</label>
            </div>
            <div class="form-floating mb-3">
                <input type = "text" name = "senha" class="form-control rounded-3" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Senha</label>
            </div>
            
            <button class="w-100 mb-2 btn btn-lg rounded-3 btn-primary" type="submit">Enviar</button>
            
            </form>
        </div>
        </div>
    </div>
    </div>

<?php
    @$nome = $_POST["nome"];
    @$login = $_POST["login"];
    @$senha = $_POST["senha"];


    $sql=mysqli_connect("localhost", "root", "", "banco_etec"); // funcao para chamar o bd

    mysqli_query($sql,"insert into usuario(nome,login,senha)
                values('$nome','$login','$senha')"); // query quer dizer p colocar uma funcao de sql


?>

</div>

<footer class="pt-5 my-5 text-body-secondary border-top">
    <p class = "rodape" >Desenvolvido por Samuel e Vinicius; 2024</p>
</footer>

</center>

<script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>