<?php
include("conexao.php");
$id=$_GET["id"];
$consulta=mysqli_query($conexao,"select * from produtos where idProduto='$id'");
$dados=mysqli_fetch_array($consulta);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="gravar.php">
		Id:<br>
		<input type="text" name="ide" readonly value=<?php echo $dados["idProduto"]?> ><br><br>
		Nome:<br>
		<input type="text" name="nome"  value="<?php echo $dados['nome_produto']?>" ><br><br>
		
		<input type="submit" Value="Enviar">

	</form>

</body>
</html>