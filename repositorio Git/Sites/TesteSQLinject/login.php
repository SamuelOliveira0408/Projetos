<?php
session_start();
include 'conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE login = '$login'";
$result = mysqli_query($conexao, $sql);

if ($user = mysqli_fetch_assoc($result)) {
    if (password_verify($senha, $user['senha'])) {
        $_SESSION['nome'] = $user['nome'];
        header("Location: bem_vindo.php");
        exit;
    }
}

echo "<script>alert('Login ou senha inválidos.'); window.location='login.html';</script>";
?>
