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

	$categoria = $_GET["categoria"];
	$sql = "INSERT INTO tcategoria(Descricao) Values('$categoria')";
	$query = mysqli_query($conn, $sql);

	header("Location: cadastroCategoria.php");
?>