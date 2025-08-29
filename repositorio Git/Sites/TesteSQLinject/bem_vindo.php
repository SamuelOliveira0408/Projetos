<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header("Location: login.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Bem-vindo</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5 text-center">
    <div class="card p-5 shadow-lg">
      <h1 class="mb-4">Bem-vindo, <?php echo htmlspecialchars($_SESSION['nome']); ?>!</h1>
      <p class="lead">Seu login foi realizado com sucesso.</p>
      <a href="login.html" class="btn btn-secondary mt-3">Sair</a>
    </div>
  </div>
</body>
</html>
