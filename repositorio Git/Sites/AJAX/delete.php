<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtém o ID do produto a ser excluído
$idProduto = isset($_POST['id']) ? $_POST['id'] : 0;

$response = [];
if ($idProduto) {
    $stmt = $conn->prepare("DELETE FROM produtos WHERE idProduto = ?");
    $stmt->bind_param("i", $idProduto);
    
    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Produto excluído com sucesso.';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Erro ao excluir o produto.';
    }
    
    $stmt->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'ID do produto não informado.';
}

$conn->close();
echo json_encode($response);
?>
