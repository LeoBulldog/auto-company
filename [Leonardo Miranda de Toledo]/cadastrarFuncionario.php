<html>
	<head>
		<title>Cadastrando funcion�rio</title>
	</head>
	<body>
		<h1>Gravando informa��es sobre o funcion�rio</h1>
	<?php
		/* salvar como cadastrarFuncionario.php na pasta [03] 14.10.2020 PHP FORM2 */
		
		$nome				= filter_input(INPUT_POST, "nome");
		$sexo				= filter_input(INPUT_POST, "sexo");
		$nascimento         = filter_input(INPUT_POST, "nascimento") ;
		$idade				= filter_input(INPUT_POST, "idade");
		$setor				= filter_input(INPUT_POST, "setor");
		$cargo				= filter_input(INPUT_POST, "cargo");
		$tempoEmpresa		= filter_input(INPUT_POST, "tempoEmpresa");
		$salario			= filter_input(INPUT_POST, "salario");
		$vendeVeiculos		= filter_input(INPUT_POST, "vendeVriculos");
		$veiculosVendidos	= filter_input(INPUT_POST, "veiculosVendidos");
		$comissao			= filter_input(INPUT_POST, "comissao");
		$uf					= filter_input(INPUT_POST, "uf") ;
		
		
		if($nome=="")
		{
			die("Digite o nome do funcion�rio para prosseguir!");
		}
		if($idade=="")
		{
			die("Digite a idade do funcion�rio para prosseguir!");
		}
		if($setor=="")
		{
			die("Digite o setor onde o funcion�rio trabalha antes de prosseguir!");
		}
		if($cargo=="")
		{
			die("Digite o cargo que o funcion�rio exerce na concession�ria para continuar!");
		}
		if($tempoEmpresa=="")
		{
			die("Digite quanto tempo faz que o funcion�rio trabalha na concession�ria!");
		}
		if($salario=="")
		{
			die("Este campo n�o pode ficar vazio!");
		}
		if($veiculosVendidos=="")
		{
			die("Ei, parece que voc� esqueceu deste campo!");
		}
		if($comissao=="")
		{
			die("Voc� esqueceu de mim!");
		}
		
		
		echo "Nome: $nome <br> ";
		echo "Sexo do funcion�rio: $sexo <br>";
		echo "Data de Nascimento: $nascimento <br>";
		echo "Idade: $idade <br>";
		echo "Setor no qual trabalha: $setor <br>";
		echo "Cargo que exerce: $cargo <br>";
		echo "Quanto tempo j� trabalha na concession�ria: $tempoEmpresa <br>";
		echo "Sal�rio que recebe: $salario <br>";
		echo "O funcion�rio vende ve�culos? $vendeVeiculos <br>";
		echo "Ve�culos que vendeu neste m�s: $veiculosVendidos <br>";
		echo "Comiss�o a receber: $comissao <br>";
		echo "Estado da filial onde trabalha: $uf <br>";
		
		if($veiculosVendidos=="00")
		{
			echo "Este funcion�rio n�o vende ve�culos";
		}
		
		echo "<hr>";
		
		$servidor = "localhost";
		$usuario="root";
		$senha="";
		$banco="autocompany_concessionaria";
		
		$con = mysqli_connect($servidor,$usuario,$senha);
		
		mysqli_select_db($con, $banco) or 
			die("Erro na sele��o/abertura do banco:" . 
				mysqli_error($con) );
				
		$sql =
		"INSERT INTO funcionarios
		(nome, sexo, nascimento,	  idade,    setor,  cargo,   tempoEmpresa,   salario, vendeVeiculos,   veiculosVendidos,   comissao,   uf) 
		VALUES 
		('$nome','$sexo', '$nascimento', '$idade','$setor','$cargo','$tempoEmpresa','$salario','$vendeVeiculos','$veiculosVendidos','$comissao','$uf')";
		
		mysqli_query($con,$sql) or 
			die("Erro na inser��o de dados sobre o funcion�rio:" . mysqli_error($con) );
			
		echo "Funcion�rio <b>$nome</b> cadastrado com sucesso";
	?>
	</body>
</html>