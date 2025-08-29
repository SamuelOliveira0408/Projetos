<?php
include("conexao.php");
$id=$_POST["ide"];
$nome=$_POST["nome"];

mysqli_query($conexao,"UPDATE produtos SET nome_produto='$nome' where idProduto='$id'");
echo "<button onclick=window.location.href='CadastroProd.php'>Voltar</a><br>";


?>