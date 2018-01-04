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

	$cpf = $_SESSION["cpf"];
	$data = $_GET["dataEntrada"];
	$codCategoria = $_GET["selectCategoriaEntrada"];
	$descricao = $_GET["descEntrada"];
	$valor = $_GET["valorEntrada"];

	$sql = "INSERT INTO tentradas (CPF, Data, ID_Categoria, Descricao, Valor) VALUES ('$cpf', '$data', '$codCategoria', '$descricao', '$valor')";
	$insere = mysqli_query($conn, $sql);

	header("Location: controlePrincipal.php");
	
?>