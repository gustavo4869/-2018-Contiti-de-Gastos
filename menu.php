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
?>
<html>
	<head>
	<!-- http://unicorn-ui.com/buttons/-->
	<!-- http://unicorn-ui.com/buttons/-->
		<title>Menu - Controle de Gastos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">  
		<link rel="stylesheet" type="text/css" href="css/buttons.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">		
	</head>
	<body>		
		<div id = "cabecalho">
			<div id="conteudoPensamento">
				<img src="ibagens/pensamento.png"></img>
				
				<font id="letraCabecalho">&nbsp;&nbsp;&nbsp;$FraseDia</font>			
			</div>

			<div id="conteudoUser">
				<img src="ibagens/user.png"></img>
				<font id="letraCabecalho">&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["user"]; ?> , <a href="#">Sair</a></font>				
			</div>		
			
		</div>
		<div id = "menu">
			<h1 id="titulo">Contiti de Gastos</h1>
			<a id = "btnMenu" href="controlePrincipal.php" class="button button-block button-rounded button-primary button-large">Lançar Despesas/Entradas <i class="glyphicon glyphicon-usd"></i></a>		
			<a id = "btnMenu" href="#" style = "background-color: Lavender;" class="button button-block button-rounded button-large">Relatórios Mensais  <i class="glyphicon glyphicon-list-alt"></i></a>		
			<a id = "btnMenu" href="cadastroCategoria.php" class="button button-block button-rounded button-caution button-large">Cadastrar Categoria <i class="glyphicon glyphicon-plus-sign"></i></a>		
			<a id = "btnMenu" href="#" class="button button-block button-rounded button-royal button-large">Sobre  <i class="glyphicon glyphicon-user"></i></a>		
		<div>
	</body>
</html>