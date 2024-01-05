
<?php


$nome =$_GET["nome"];
$genero =$_GET["sexo"];
$dtnasc   =$_GET["data"];
$CPF_CNPJ  =$_GET["CPF/CNPJ"];
$PessoaFisica   =$_GET["pessoa"];
$UF =$_GET["UF"];
$CEP    =$_GET["CEP"];
$Tel    =$_GET["Tel"];
$Email  =$_GET["Email"];
$Autorizacao    =$_GET["autorizacao"];
$Comentarios    =$_GET["Comentarios"];

//conecção com o servidor
	
	$cli = mysqli_connect ("localhost" , "root" , "") or
		die("Erro na conexão com Servidor MYSQL");
		
		$db = mysqli_select_db($cli, "autocompany_concessionaria") or
        die("Erro na abertura do banco de dados: " . mysqli_error($cli) );
	
	$sql = "INSERT INTO clientes  (nome, genero, dtnasc, cpf_cnpj, Pfisica, uf, cep, telefone, email, Autorizacao, Comentarios)
        VALUES ('$nome','$genero','$dtnasc','$CPF_CNPJ','$PessoaFisica','$UF','$CEP','$Tel','$Email','$Autorizacao','$Comentarios')";
        
		mysqli_query($cli, $sql) or
        die("Erro na inclusão de registro: " . mysqli_error($cli) );    	
    $rs = mysqli_query($cli,"SELECT LAST_INSERT_ID() FROM clientes");
    $registros = mysqli_fetch_array($rs);
    $idCriado = $registros[0];
    echo "<hr>";
    echo "registro $idCriado inserido na tabela clientes";


?>
