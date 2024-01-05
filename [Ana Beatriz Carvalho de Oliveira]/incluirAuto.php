<html>
   <head> 
      <title>Cadastramento</title>
</head>
<body>
   <h2>Cadastramento do Autom�vel</h2>

<?php

    $fabricante = $_POST['fabricante'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $cor = $_POST['cor'];
    $ano = $_POST['ano'];
	$uf = $_POST['uf'];
	$montadora = $_POST['montadora'];
	$cambioAutomatico = 0;
    $combustivel = $_POST['combustivel'];
    $km = $_POST['km'];
    $licenciado = 0;
	
if (isset($_POST["cambioAutomatico"]))
{
	$cambioAutomatico= $_POST["cambioAutomatico"];
}
if (isset($_POST["licenciado"]))
{
	$licenciado= $_POST["licenciado"];
}
if($fabricante=="")
{
die("Nome do Fabricante deve ser informado. Sistema cancelado!");
}
if($placa=="")
{
die("A Placa deve ser informado. Sistema cancelado!");
}
if($montadora=="")
{
die("A Montadora deve ser informado. Sistema cancelado!");
}

echo "O Fabricante do ve�culo: <b>$fabricante</b> <br>";
echo "O Modelo: <b>$modelo</b>  <br>"; 
echo "A Placa do ve�culo: <b>$placa</b> <br>";
echo "A colora��o do ve�culo: <b>$cor</b> <br>";
echo "O Ano de fabrica��o: <b>$ano</b> <br>";
echo "O Estado (uf) do ve�culo: <b>$uf</b> <br>";
echo "Montadora do ve�culo: <b>$montadora</b> <br>";
echo "O ve�culo possui C�mbio Autom�tico: <b>$cambioAutomatico</b> <br>";
echo "O Combust�vel: <b>$combustivel</b> <br>";
echo "A Quilometragem(km) que o carro possui : <b>$km</b> <br>";
echo "O ve�culo possui licenciamento: <b>$licenciado</b> <br> <hr> ";
echo "Cadastro do Autom�vel realizado com sucesso";

$con = mysqli_connect("localhost", "root","") or
die("Erro na conex�o com Servidor MYSQL");

$db = mysqli_select_db($con, "autocompany_concessionaria") or
die("Erro na abertura do banco de dados: " . mysqli_error($con) );

$sql = "INSERT INTO automoveis (fabricante, modelo, placa, cor, ano, uf, montadora, cambioAutomatico, combustivel, km, licenciado) VALUES ('$fabricante', '$modelo', '$placa', '$cor', '$ano', '$uf', '$montadora', '$cambioAutomatico', '$combustivel', '$km', '$licenciado')";

mysqli_query($con, $sql) or
die("Erro na inser��o de registro do Autom�vel: " . mysqli_error($con) );

$rs = mysqli_query($con, "SELECT LAST_INSERT_ID() FROM automoveis");
$dados = mysqli_fetch_array($rs);
$idCriado = $dados[0];
echo "<hr>";
echo "Registro $idCriado inserido na tabela Automoveis";

?>
</body>
</html>