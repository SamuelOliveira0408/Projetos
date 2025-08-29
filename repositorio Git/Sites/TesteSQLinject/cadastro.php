<?php
include 'conexao.php';

$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nome, login, senha) VALUES ('$nome', '$login', '$senha')";

if (mysqli_query($conexao, $sql)) {
    header("Location: login.html");
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}
?>

