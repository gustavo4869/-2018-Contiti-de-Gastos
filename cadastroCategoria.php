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
	<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	 
	<!--<script src="bootstrap-confirmation.min.js"></script>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">	-->
	<title>Cadastro de Categoria</title>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">  
	<link rel="stylesheet" type="text/css" href="css/buttons.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
		
		#modalExclusao {
			left: 30%;
			top: 10%;
			right: 30%;
			outline: none;
		}
		
		#modalExclusaoEntrada {
			left: 30%;
			top: 10%;
			right: 30%;
			outline: none;
		}
	</style>
	<script>		
		function gravaValorBtn(botao){
			var btnValue = $(botao).val();
			$('#hiddenAux').val(btnValue);
		}
		
		function excluiCategoria(){			
			/*var value = $("#selectCategoriaDespesa").val();	    	
	    	var texto = $("#selectCategoriaDespesa").find(":selected").text();				*/							
			formEditaCategoria.submit();		
		}
		
		function excluiCategoriaEntrada(){								
			formEditaCategoriaEntrada.submit();		
		}
	</script>
	
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
	
	
	<!-- Código Fonte Página: cadastroCategoria.php -->
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
		
		<!-- Formulário Adiciona Nova Categoria -->
		<div id="formulario">					
			<form name="formCategoria" action="gravaCategoria.php">			
			<fieldset class="form-group">
				<legend>Cadastrar Categorias Despesa</legend>
			<center>		
			<label for="txtCategoria">Nome Categoria
				<input type="text" id="txtCategoria" class="form-control" name="categoriaDespesa" required>						
			</label>
			</center>
			<fieldset>
				<label for="tipoCategoria">Tipo<br>
					<label class="radio-inline"><input type="radio" name="tipoCategoria" value="1" required>Despesa</label>
					<label class="radio-inline"><input type="radio" name="tipoCategoria" value="2">Entrada</label>	
				</label>
			</fieldset>
			<br><br>
			<center><button class="btn btn-primary" type="submit"  name="btnEntrada"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Categoria</button></center>		
			</fieldset>			
			</form>
		</div>	
		
		<br><br><br>	
		
		<!-- Formulário Edita Categoria Despesa -->
		<div id="formulario">	
			<form name="formEditaCategoria" action="editaCategoria.php">
				<fieldset class="form-group">
				<legend>Editar Categorias Despesa</legend>
				<font>Selecione uma Categoria</font>
				<center>
					<select name="selectCategoriaDespesa" class="form-control" id="selectCategoriaDespesa" onchange="carregaDespesa(this);">
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
					<input type="hidden" name="btnEditaCategoria" id="hiddenAux" value="null">				
					</label>
					<center>
						<button class="btn btn-primary" type="submit"  name="btnEditaCategoria" value="editaCategoriaDespesa"><i class="glyphicon glyphicon-pencil"></i> Editar Categoria</button>																														
						<button class="btn btn-danger" type="button" onclick="gravaValorBtn(this);" name="btnExcluiCategoria" value="excluiCategoriaDespesa" data-toggle="modal" data-target="#modalExclusao"><i class="glyphicon glyphicon-trash"></i> Excluir Categoria</button>
					</center>
				</center>				
			</form>			
		</div>
		
		<!-- Formulário Edita Categoria Entrada -->
		<div id="formulario">
			<form name="formEditaCategoriaEntrada" action="editaCategoriaEntrada.php">
				<fieldset class="form-group">
				<legend>Editar Categorias Entrada</legend>
				<font>Selecione uma Categoria</font>
				<center>
					<select name="selectCategoriaEntrada" class="form-control" id="txtCategoria" onchange="carregaEntrada(this);">
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
					<input type="hidden" name="btnEditaCategoria" id="hiddenAux" value="null">									
					</label>
					<center>						
						<button class="btn btn-primary" type="submit"  name="btnEditaCategoria" id="btn" value="editaCategoriaEntrada"><i class="glyphicon glyphicon-pencil"></i> Editar Categoria</button>												
						<button class="btn btn-danger" type="button" onclick="gravaValorBtn(this);" name="btnExcluiCategoria" value="excluiCategoriaEntrada" data-toggle="modal" data-target="#modalExclusaoEntrada"><i class="glyphicon glyphicon-trash"></i> Excluir Categoria</button>						
					</center>
				</center>				
			</form>			
		</div>
	</div>
	
	<!-- Alerts / Confirms / Modals... -->
	
	<!-- Modal Exclusão Categoria Despesa -->
	<div class="modal-dialog">		
		<div id="modalExclusao" class="modal fade" role="dialog">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Exclusão de Categoria!</h4>
			  </div>
			  <div class="modal-body">
				<p>Deseja excluir Categoria !?</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" onclick="excluiCategoria();" data-dismiss="modal">Excluir</button>
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
			  </div>
			</div>
		</div>
	</div>
	
	<!-- Modal Exclusão Categoria Entrada-->
	<div class="modal-dialog">		
		<div id="modalExclusaoEntrada" class="modal fade" role="dialog">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Exclusão de Categoria!</h4>
			  </div>
			  <div class="modal-body">
				<p>Deseja excluir Categoria !?</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-danger" onclick="excluiCategoriaEntrada();" data-dismiss="modal">Excluir</button>
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
			  </div>
			</div>
		</div>
	</div>
</body>
</html>


