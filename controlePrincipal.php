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
	setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );
	date_default_timezone_set( 'America/Sao_Paulo' );	
	$cpf = $_SESSION["cpf"];
?>


<!-- saved from url=(0041)http://localhost:30/controlePrincipal.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Controle de Entrada e Saída</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>		  
		<link rel="stylesheet" type="text/css" href="buttons.css">
		<link rel='stylesheet prefetch' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
		<link rel="stylesheet" type="text/css" href="estilo.css">		
		<style type="text/css">
			#separa{	
				padding: 5px;
				border:1px solid black;
				margin-top: 60px;				
				text-align: center;
				background-color: ;							
				display: inline-block;
				vertical-align: top;				
			}
			
			#cabecalho {
				height: 80px;
				background-color: cyan;				
			}
			
			#menu {
				text-align: center;
				padding-top: 20px;
				width: 40%;
				margin: auto;
			}
			
			#letraCabecalho {
				font-family: Impact;
				font-size: 16px;								
				
			}
			
			#conteudoUser {
				text-align: right; 
				width: 70%;
				Display: inline-block;
			}
			
			#conteudoPensamento {
				padding-left: 40px;
				margin-top: 15px; 
				width: 25%;
				Display: inline-block;
			}
			
			#titulo {
				font-family: Arial;			
			}
			
			#btnMenu {
				margin: 5px;
			}
			
			#conteudo{\
				text-align: center;
				height: 100%;
				background-color: lightblue;				
			}			

			#despesas {				
				width: 40%;
				margin-top: 60px;
				margin-left: 50px;				
				display: inline-block;
			}

			#entradas {				
				width: 40%;
				margin-top: 60px;
				display: inline-block;
			}

			#camposDespesas{
				
				padding-left: 40px;
				padding-bottom: 20px;				
			}

			#fontDespesas{
				font-family: Arial;
				font-weight: bold;
				font-size: 14px; 
			}

			#letraCabecalhoDesp {
				font-family: Impact;
				font-size: 20px;								
				
			}

			#inputsDesp{
				width: 80%;
				height: 30px;
			}

			#tabela {
				margin: 0 auto;
				width: 90%;
				
			}

			#tbTitulo {
				text-align: center;
				font-weight: bold;
			}

			#tbConteudo {
				text-align: center;
			}
			
			#linha{
				height: 1px;
				line-height: 0;
				background-color: black;
			}
			
			#fonteBalanco{
				font-family: Arial;
				font-size: 15px;
				font-weight: bold;
			}
			.table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
				background-color: ice;
			}
  
			#fonteBalancoSaida{
				font-family: impact;
				font-size: 25px;
				color: red;
			}

			#fonteBalancoEntrada{
				font-family: impact;
				font-size: 25px;
				color: green;
			}
		</style>
	</head>
	<body bgcolor="cyan">
		<div id="cabecalho">
			<div id="conteudoPensamento">
				<img src="ibagens/pensamento.png">				
				<font id="letraCabecalho">&nbsp;&nbsp;&nbsp;$FraseDia</font>					
			</div>

			<div id="conteudoUser">
				<img src="ibagens/user.png">
				<font id="letraCabecalho">&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["user"]; ?> , <a href="menu.php">Sair</a></font>				
			</div>				
		</div>		
		<div id="linha"></div>
		<div id="conteudo">			
			<center><h2>Painel Principal</h2></center>
			<div id="despesas">
				<center><h2 id="letraCabecalhoDesp">Despesas</h2></center>
				<div id="camposDespesas">
					<form name="formDespesa" id="formDespesa" action="http://localhost/gravaDespesa.php" autocomplete="off">
						<font id="fontDespesas">
							<div class="row">
								<div class="form-group col-md-6">
									Descrição 
									<input type="text" id="inputsDesp" class="form-control" name="descDespesa" placeholder="Descrição" required="">
								</div>								
								<div class="form-group col-md-6">
									Categoria 
									<select class="form-control" id="inputsDesp" name="selectCategoriaDespesa" required="">
										<option value = "-1">Selecione uma Opção...</option>
										<?php
											$sql = "select * from tcategoria";
											$result = mysqli_query($conn, $sql);											
											while($row = mysqli_fetch_array($result)){
												$idCategoria = $row["ID"];
												$categoria = $row["Descricao"];
												echo "<option value=$idCategoria>$categoria</option>";
											}
										?>
								    </select>
								</div>								
							</div>
							
							<div class="row">
								<div class="form-group col-md-6">
									Data
						    		<input type="date" name="dataDesp" class="form-control" id="inputsDesp" required="">
						    	</div>
						    	Valor
						    	<label class="sr-only" for="inlineFormInputGroup">Valor</label>
								<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<div class="input-group-addon"><b>$</b></div>
								    <input type="text" class="form-control" id="inputsDesp" placeholder="Valor" name="valorDespesa" required="">
								 </div>
							</div>						    
					    </font>			
					    <br>		    
					    <center><button class="btn btn-primary" type="submit" style="width: 30%;" name="btnDespesa" onclick="return valida()"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Despesa</button></center>
					</form>
					<center>
						<table name="tbDespesas" id="tabela" class="table table-hover">
							<tbody>
							<thead class="thead-dark">
								<tr class="table-dark">
									<td id="tbTitulo">Data</td>
									<td id="tbTitulo">Categoria</td>
									<td id="tbTitulo">Descrição</td>
									<td id="tbTitulo">Valor</td>
								</tr>
							</thead>							
								<?php			
									$mesAtual = date('m');								
									$sql = "select * from tdespesas where CPF = '$cpf' AND MONTH(Data) = '$mesAtual'";
									$result = mysqli_query($conn, $sql);
									while($r = mysqli_fetch_array($result)){
											$data = $r["Data"];
											$dataFormatada = date("d/m/Y", strtotime($data));
											
											$idCategoria = $r["ID_Categoria"];											
											$sql1 = "select Descricao from tcategoria where ID = '$idCategoria'";
											$result1 = mysqli_query($conn, $sql1);
											$row = mysqli_fetch_array($result1);
											$categoria = $row[0];
											
											$descricao = $r["Descricao"];
											$valor = $r["Valor"];
											$valorFormatado = number_format($valor, 2, ',', '.');
											echo   "<tr>
													<td id=tbConteudo>$dataFormatada</td>
													<td id=tbConteudo>$categoria</td>
													<td id=tbConteudo>$descricao</td>
													<td id=tbConteudo>$valorFormatado</td>";											
									}
								?>
						</table>								
					</center>					
				</div>				
			</div>
			<div id="separa">
				<?php
					$mesAtual = strftime('%B', strtotime(date("Y-m-d")));
					$anoAtual = strftime('%Y', strtotime(date("Y-m-d")));
					echo "<b id=letraCabecalhoDesp>" . ucfirst($mesAtual) . "/" . $anoAtual . "</b>";
				?>
				<br><br>
				<font id="fonteBalanco">Balanço Mensal</font>			
				<br>				
					<?php					
						$mesAtual = date('m');
						$somaDespesa = "select sum(valor) from tdespesas where CPF='$cpf' AND MONTH(Data) = '$mesAtual'";
						$somaEntrada = "select sum(valor) from tentradas where CPF='$cpf' AND MONTH(Data) = '$mesAtual'";
						$query1 = mysqli_query($conn, $somaDespesa);
						$query2 = mysqli_query($conn, $somaEntrada);
						$row1 = mysqli_fetch_array($query1);
						$row2 = mysqli_fetch_array($query2);	
						$resultSomaDespesa = $row1[0];
						$resultSomaEntrada = $row2[0];

						$resultadoFinal = $resultSomaEntrada - $resultSomaDespesa;
						if($resultadoFinal > 0)
							echo "<font id=fonteBalancoEntrada>R$ " . number_format($resultadoFinal, 2, ',', '.') . "</font>";
						else
							echo "<font id=fonteBalancoSaida>R$ " . number_format($resultadoFinal, 2, ',', '.') . "</font>";
						
					?>				
				<br><br>
				<font id="fonteBalanco">Entrada Total</font>
				<br>				
					<?php					
						$mesAtual = date('m');
						$sql = "select SUM(valor) from tentradas where CPF = '$cpf' AND MONTH(Data) = '$mesAtual'";
						$query = mysqli_query($conn, $sql);
						while($row = mysqli_fetch_array($query)){
							$somaDespesas = $row[0];
							echo "<font id=fonteBalancoEntrada>R$ " . number_format($somaDespesas, 2, ',', '.') . "</font>";
						}
					?>				
				<br><br>
				<font id="fonteBalanco">Despesa Total</font>
				<br>				
					<?php					
						$mesAtual = date('m');
						$sql = "select SUM(valor) from tdespesas where CPF = '$cpf' AND MONTH(Data) = '$mesAtual'";
						$query = mysqli_query($conn, $sql);
						while($row = mysqli_fetch_array($query)){
							$somaDespesas = $row[0];
							echo "<font id=fonteBalancoSaida>R$ " . number_format($somaDespesas, 2, ',', '.') . "</font>";
						}
					?>				
			</div>
			<div id="entradas">
				<center><h2 id="letraCabecalhoDesp">Entradas</h2></center>
				<div id="camposDespesas">
					<form name="formEntrada" id="formEntrada" autocomplete="off" action="gravaEntrada.php">						
						<font id="fontDespesas">
							<div class="row">
								<div class="form-group col-md-6">
									Descrição 
									<input type="text" id="inputsDesp" class="form-control" name="descEntrada" placeholder="Descrição" required="">
								</div>								
								<div class="form-group col-md-6">
									Categoria 
									<select class="form-control" id="inputsDesp" name="selectCategoriaEntrada" required="">
								      <option value = "-1">Selecione uma Opção...</option>
										<?php
											$sql = "select * from tcategoriaentrada";
											$result = mysqli_query($conn, $sql);											
											while($row = mysqli_fetch_array($result)){
												$idCategoria = $row["ID"];
												$categoria = $row["Descricao"];
												echo "<option value=$idCategoria>$categoria</option>";
											}
										?>
								    </select>
								</div>								
							</div>
							
							<div class="row">
								<div class="form-group col-md-6">
									Data
						    		<input type="date" name="dataEntrada" class="form-control" id="inputsDesp" required="">
						    	</div>
						    	Valor
						    	<label class="sr-only" for="inlineFormInputGroup">Valor</label>
								<div class="input-group mb-2 mr-sm-2 mb-sm-0">
									<div class="input-group-addon"><b>$</b></div>
								    <input type="text" class="form-control" id="inputsDesp" placeholder="Valor" name="valorEntrada" required="">
								 </div>
							</div>						    
					    </font>			
					    <br>		    
					    <center><button class="btn btn-success" type="submit" style="width: 30%;" name="btnEntrada"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Entrada</button></center>										    
					</form>

					<center>
						<table name="tbDespesas" id="tabela" class="table table-hover">
							<tbody>
							<thead class="thead-light">
								<tr>
									<td id="tbTitulo">Data</td>
									<td id="tbTitulo">Categoria</td>
									<td id="tbTitulo">Descrição</td>
									<td id="tbTitulo">Valor</td>
								</tr>
							</thead>
								<?php	
									$mesAtual = date('m');
									$sql = "select * from tentradas where CPF = '$cpf' AND MONTH(Data) = '$mesAtual'";
									$result = mysqli_query($conn, $sql);
									while($r = mysqli_fetch_array($result)){
											$data = $r["Data"];
											$dataFormatada = date("d/m/Y", strtotime($data));
											
											$idCategoria = $r["ID_Categoria"];											
											$sql1 = "select Descricao from tcategoriaentrada where ID = '$idCategoria'";
											$result1 = mysqli_query($conn, $sql1);
											$row = mysqli_fetch_array($result1);
											$categoria = $row[0];
											
											$descricao = $r["Descricao"];
											$valor = $r["Valor"];
											$valorFormatado = number_format($valor, 2, ',', '.');
											echo   "<tr>
													<td id=tbConteudo>$dataFormatada</td>
													<td id=tbConteudo>$categoria</td>
													<td id=tbConteudo>$descricao</td>
													<td id=tbConteudo>$valorFormatado</td>";											
									}
								?>												
						</tr></tbody></table>	
					</center>	

				</div>				
			</div>
		</div>
	
</body></html>