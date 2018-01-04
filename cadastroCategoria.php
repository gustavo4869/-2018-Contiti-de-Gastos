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
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Categoria</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">	    
	</script>		  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">  
	<link rel="stylesheet" type="text/css" href="css/buttons.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="estilo.css">	
	<style type="text/css">
		.main {			
			width: 70%;
			height: 0 auto;
			margin-top: 15px;
			margin-left: auto;
			margin-right: auto;
			background-color: lightgreen;
			text-align: center;
			padding: 15px;						
		}

		#titulo {
			font-family: Verdana;
		}

		fieldset {
			margin: auto;
			width: 70%;
		}

		font {
			font-family: arial;
			font-weight: bold;
			font-size: 16px;
		}
		#txtCategoria {
			width: 80%;
			margin: 5px;
		}

		#formulario {
			vertical-align: top;
			width: 40%;			
			background-color: pink;
			margin: auto;
			display: inline-block;
			border-style: outset;
			padding: 10px;
		}

		#btn {
			width: auto;
			display: inline-block;
		}
	</style>

	<script type="text/javascript">
		function carregaDespesa(element){
			// value
	    	var value = $(element).val();
	    	// text
	    	var texto = $(element).find(":selected").text();
	    	$('input[name=editCategoriaDespesa]').val(texto);	    	    	
	    }

	    function carregaEntrada(element){
			// value
	    	var value = $(element).val();
	    	// text
	    	var texto = $(element).find(":selected").text();
	    	$('input[name=editCategoriaEntrada]').val(texto);	    	    	
	    }
	</script>
</head>
<body>
	<div id = "cabecalho">
		<div id="conteudoPensamento">
			<img src="ibagens/pensamento.png"></img>			
			<font id="letraCabecalho">&nbsp;&nbsp;&nbsp;$FraseDia</font>			
		</div>
		<div id="conteudoUser">
			<img src="ibagens/user.png"></img>
			<font id="letraCabecalho">&nbsp;&nbsp;&nbsp;<?php echo $_SESSION['user']; ?> , <a href="#">Sair</a></font>				
		</div>				
	</div>
	<div class="main">
		<center><h2 id="titulo">Editor de Categoria</h2></center>		
		<br><hr><br>		
		<div id="formulario">					
			<form name="formCategoria" action="gravaCategoria.php">			
			<fieldset class="form-group">
				<legend>Cadastrar Categorias Despesa</legend>
			<center>		
			<label for="txtCategoria">Nome Categoria
				<input type="text" id="txtCategoria" class="form-control" name="categoriaDespesa" required>						
			</label>
			</center>
			<br>
			<center><button class="btn btn-primary" type="submit"  name="btnEntrada"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Categoria</button></center>		
			</fieldset>			
			</form>
		</div>	
		<div id="formulario">
			<form name="formEditaCategoria">
				<fieldset class="form-group">
				<legend>Editar Categorias Despesa</legend>
				<font>Selecione uma Categoria</font>
				<center>
					<select name="selectCategoria" class="form-control" id="txtCategoria" onchange="carregaDespesa(this);">
						<option>Selecione Uma Opção</option>
						<?php
							$sql = "select * from tCategoria";
							$query = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($query)) {
								$id = $row[0];
								$categoria = $row[1];
								echo "<option value=$id>$categoria</option>";
							}						
						?>
					</select>
					<label for="txtCategoria">Nome Categoria
					<input type="text" id="txtCategoria" class="form-control" name="editCategoriaDespesa" required>						
					</label>
					<center>
						<button class="btn btn-primary" type="submit"  name="btnEntrada"><i class="glyphicon glyphicon-pencil"></i> Editar Categoria</button>												
						<button class="btn btn-danger" type="submit"  name="btnEntrada"><i class="glyphicon glyphicon-trash"></i> Excluir Categoria</button>
					</center>
				</center>				
			</form>			
		</div>
		<br><br><br>
		<div id="formulario">					
			<form name="formCategoria" action="gravaCategoriaEntrada.php">			
			<fieldset class="form-group">
				<legend>Cadastrar Categorias Entrada</legend>
			<center>		
			<label for="txtCategoria">Nome Categoria
				<input type="text" id="txtCategoria" class="form-control" name="categoriaEntrada" required>						
			</label>
			</center>
			<br>
			<center><button class="btn btn-primary" type="submit"  name="btnEntrada"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Categoria</button></center>		
			</fieldset>			
			</form>
		</div>	
		<div id="formulario">
			<form name="formEditaCategoria">
				<fieldset class="form-group">
				<legend>Editar Categorias Entrada</legend>
				<font>Selecione uma Categoria</font>
				<center>
					<select name="selectCategoria" class="form-control" id="txtCategoria" onchange="carregaEntrada(this);">
						<option>Selecione Uma Opção</option>
						<?php
							$sql = "select * from tCategoriaentrada";
							$query = mysqli_query($conn, $sql);
							while ($row = mysqli_fetch_array($query)) {
								$id = $row[0];
								$categoria = $row[1];
								echo "<option value=$id>$categoria</option>";
							}						
						?>
					</select>
					<label for="txtCategoria">Nome Categoria
					<input type="text" id="txtCategoria" class="form-control" name="editCategoriaEntrada" required>						
					</label>
					<center>						
						<button class="btn btn-primary" type="submit"  name="btnEntrada" id="btn"><i class="glyphicon glyphicon-pencil"></i> Editar Categoria</button>												
						<button class="btn btn-danger" type="submit"  name="btnEntrada" id="btn"><i class="glyphicon glyphicon-trash"></i> Excluir Categoria</button>						
					</center>
				</center>				
			</form>			
		</div>
	</div>
</body>
</html>