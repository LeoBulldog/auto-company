<?php
	
	$diadesaida 		= $_GET["diadesaida"];
	$diadedevolucao		= $_GET["diadedevolucao"];
	$fabricante			= $_GET["fabricante"];
	$modelo 			= $_GET["modelo"];
	$placa				= $_GET["placa"];
	$estadoderetirada	= $_GET["estadoderetirada"];
	$cidadederetirada	= $_GET["cidadederetirada"];
	$horadesaida		= $_GET["horadesaida"];
	$horadedevolucao	= $_GET["horadedevolucao"];
	$valor				= $_GET["valor"];
	$localderetirada	= $_GET["localderetirada"];
	
		
	echo "Data de saida: <a>$diadesaida</a> <br>";
	echo "Data de devolução: <a>$diadedevolucao</a> <br>";
    echo "Fabricante: <a>$fabricante</a>  <br>";
    echo "Modelo: <a>$modelo</a>  <br>";
    echo "Placa: <a>$placa</a>  <br>";
    echo "Estado onde retirou: <a>$estadoderetirada</a>  <br>";
	echo "Cidade onde retirou: <a>$cidadederetirada</a>  <br>";
    echo "Horario de saída: <a>$horadesaida</a><br>";
    echo "Horario de devolução: <a>$horadedevolucao</a>  <br>";
    echo "Valor: <a>$valor</a> <br>";
    echo "Local de retirada: <a>$localderetirada</a>  <br>";
	
	$loc= mysqli_connect("localhost", "root", "") or
			die("Erro na conexão com Servidor MYSQL");
		
	$db = mysqlI_select_db($loc, "autocompany_concessionaria") or 
			die("Erro na abertura do banco de dados: " . mysqli_error($loc) );
		
	$sql = "INSERT INTO locacoes ( diadesaida,  diadedevolucao,  fabricante, modelo,  placa,  Estadoderetirada, Cidadederetirada, horadesaida,  horadedevolucao,  valor, localderetirada)
		VALUES					   ('$diadesaida','$diadedevolucao','$fabricante','$modelo','$placa','$estadoderetirada','$cidadederetirada','$horadesaida','$horadedevolucao','$valor','$localderetirada')"; 
		
	mysqli_query($loc, $sql) or
			die("Erro na inserção de registro de locacoes : " . mysqli_error($loc) );
		
	$rs = mysqli_query($loc,"SELECT LAST_INSERT_ID() FROM locacoes");
	$dados = mysqli_fetch_array($rs);
	$idCriado = $dados[0];
	
	echo "<hr>";
	echo "registro $idCriado inserido na tabela locacões";

?>