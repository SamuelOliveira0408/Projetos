<?php
// Incluindo o arquivo de conexão com o banco de dados
include("conexao.php");

// Verificar se o parâmetro 'id' está presente na URL e é válido
if (isset($_GET['id'])) {
    $id_produto = $_GET['id'];

    // Verificar se o ID é um número válido
    if (is_numeric($id_produto)) {
        // Preparando a consulta SQL para excluir o produto
        $stmt = $conexao->prepare("DELETE FROM produtos WHERE idProduto = ?");
        $stmt->bind_param("i", $id_produto);

        // Executando a consulta
        if ($stmt->execute()) {
            echo "<center><p style='color: green;'>Produto excluído com sucesso.</p></center>";
        } else {
            echo "<center><p style='color: red;'>Erro ao excluir produto.</p></center>";
        }

        // Fechar a declaração
        $stmt->close();
    } else {
        echo "<center><p style='color: red;'>ID inválido.</p></center>";
    }
} else {
    echo "<center><p style='color: red;'>ID não fornecido.</p></center>";
}

// Redirecionar para a página de listagem após a exclusão
header("Location: cadProdutosListarAlterar.php");
exit();  // Evita a execução do código após o redirecionamento
?>
