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
	
	$tipoCategoria = $_GET["tipoCategoria"];	
	$categoria = $_GET["categoriaDespesa"];
	
	if($tipoCategoria == 1)
		$sql = "INSERT INTO tcategoria(Descricao) Values('$categoria')";	
	else if($tipoCategoria == 2)
		$sql = "INSERT INTO tcategoriaentrada(Descricao) Values('$categoria')";
		
	$query = mysqli_query($conn, $sql);
	header("Location: cadastroCategoria.php");
?>