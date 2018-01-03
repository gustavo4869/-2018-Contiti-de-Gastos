<?php
	session_start();

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
	
	$user = $_POST["username"];
	$password = $_POST["password"];
	$consultaLogin = "select * from tusuarios where Usuario = '$user' AND Senha = '$password'";
	$resultado = mysqli_query($conn, $consultaLogin);

	$cpf = "select cpf from tusuarios where Usuario = '$user' AND Senha = '$password'";	
	$resultadoCpf = mysqli_query($conn, $cpf);
	$row = mysqli_fetch_row($resultadoCpf);
	$stringCpf = $row[0];
	
	if (mysqli_num_rows($resultado) > 0) {
		$_SESSION["logado"] = TRUE;
		$_SESSION["user"] = $_POST["username"];
		$_SESSION["cpf"] = $stringCpf;
		header("Location:menu.php");
		echo 'Sucesso!';
	}
	else{
		echo "fail";
		header("Location:index.html");
	}
?>
