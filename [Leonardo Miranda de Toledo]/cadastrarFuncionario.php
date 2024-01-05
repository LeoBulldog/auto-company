<html>
	<head>
		<title>Cadastrando funcionário</title>
	</head>
	<body>
		<h1>Gravando informações sobre o funcionário</h1>
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
			die("Digite o nome do funcionário para prosseguir!");
		}
		if($idade=="")
		{
			die("Digite a idade do funcionário para prosseguir!");
		}
		if($setor=="")
		{
			die("Digite o setor onde o funcionário trabalha antes de prosseguir!");
		}
		if($cargo=="")
		{
			die("Digite o cargo que o funcionário exerce na concessionária para continuar!");
		}
		if($tempoEmpresa=="")
		{
			die("Digite quanto tempo faz que o funcionário trabalha na concessionária!");
		}
		if($salario=="")
		{
			die("Este campo não pode ficar vazio!");
		}
		if($veiculosVendidos=="")
		{
			die("Ei, parece que você esqueceu deste campo!");
		}
		if($comissao=="")
		{
			die("Você esqueceu de mim!");
		}
		
		
		echo "Nome: $nome <br> ";
		echo "Sexo do funcionário: $sexo <br>";
		echo "Data de Nascimento: $nascimento <br>";
		echo "Idade: $idade <br>";
		echo "Setor no qual trabalha: $setor <br>";
		echo "Cargo que exerce: $cargo <br>";
		echo "Quanto tempo já trabalha na concessionária: $tempoEmpresa <br>";
		echo "Salário que recebe: $salario <br>";
		echo "O funcionário vende veículos? $vendeVeiculos <br>";
		echo "Veículos que vendeu neste mês: $veiculosVendidos <br>";
		echo "Comissão a receber: $comissao <br>";
		echo "Estado da filial onde trabalha: $uf <br>";
		
		if($veiculosVendidos=="00")
		{
			echo "Este funcionário não vende veículos";
		}
		
		echo "<hr>";
		
		$servidor = "localhost";
		$usuario="root";
		$senha="";
		$banco="autocompany_concessionaria";
		
		$con = mysqli_connect($servidor,$usuario,$senha);
		
		mysqli_select_db($con, $banco) or 
			die("Erro na seleção/abertura do banco:" . 
				mysqli_error($con) );
				
		$sql =
		"INSERT INTO funcionarios
		(nome, sexo, nascimento,	  idade,    setor,  cargo,   tempoEmpresa,   salario, vendeVeiculos,   veiculosVendidos,   comissao,   uf) 
		VALUES 
		('$nome','$sexo', '$nascimento', '$idade','$setor','$cargo','$tempoEmpresa','$salario','$vendeVeiculos','$veiculosVendidos','$comissao','$uf')";
		
		mysqli_query($con,$sql) or 
			die("Erro na inserção de dados sobre o funcionário:" . mysqli_error($con) );
			
		echo "Funcionário <b>$nome</b> cadastrado com sucesso";
	?>
	</body>
</html>