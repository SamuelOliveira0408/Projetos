<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "produtos";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$nome_produto = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM produtos WHERE nome_produto LIKE ?";
$stmt = $conn->prepare($sql);
$like = "%$nome_produto%";
$stmt->bind_param("s", $like);
$stmt->execute();
$result = $stmt->get_result();

$produtos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

$stmt->close();
$conn->close();
echo json_encode($produtos);
?>