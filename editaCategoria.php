<?php
	session_start();
	
	if (!isset($_SESSION["logado"]) || $_SESSION["logado"] != TRUE){
		header("Location: login.php");
	}

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "edbcontroledespesas";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $db);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$botao = $_GET["btnEditaCategoria"];
	
	if($botao == "editaCategoriaDespesa"){
		$idCategoria = $_GET["selectCategoriaDespesa"];
		$categoria = $_GET["editCategoriaDespesa"];
		$sql = "UPDATE tcategoria SET Descricao = '$categoria' WHERE ID = '$idCategoria'";
	}
	else if($botao == "excluiCategoriaDespesa"){
		$idCategoria = $_GET["selectCategoriaDespesa"];
		$categoria = $_GET["editCategoriaDespesa"];
		$sql = "DELETE FROM tcategoria WHERE ID = '$idCategoria'";
	}
	else if($botao == "excluiCategoriaEntrada"){
		$idCategoria = $_GET["selectCategoriaDespesa"];
		$categoria = $_GET["editCategoriaDespesa"];
		$sql = "DELETE FROM tcategoria WHERE ID = '$idCategoria'";
	}
	else if($botao == "editaCategoriaEntrada"){
		$idCategoria = $_GET["selectCategoriaDespesa"];
		$categoria = $_GET["editCategoriaDespesa"];
		$sql = "UPDATE tcategoria SET Descricao = '$categoria' WHERE ID = '$idCategoria'";
	}
	
	echo $botao;
	$query = mysqli_query($conn, $sql);
	header("Location: http://localhost:30/cadastroCategoria.php")
?>