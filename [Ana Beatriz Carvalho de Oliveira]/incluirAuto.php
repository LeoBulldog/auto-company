<html>
   <head> 
      <title>Cadastramento</title>
</head>
<body>
   <h2>Cadastramento do Automóvel</h2>

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

echo "O Fabricante do veículo: <b>$fabricante</b> <br>";
echo "O Modelo: <b>$modelo</b>  <br>"; 
echo "A Placa do veículo: <b>$placa</b> <br>";
echo "A coloração do veículo: <b>$cor</b> <br>";
echo "O Ano de fabricação: <b>$ano</b> <br>";
echo "O Estado (uf) do veículo: <b>$uf</b> <br>";
echo "Montadora do veículo: <b>$montadora</b> <br>";
echo "O veículo possui Câmbio Automático: <b>$cambioAutomatico</b> <br>";
echo "O Combustível: <b>$combustivel</b> <br>";
echo "A Quilometragem(km) que o carro possui : <b>$km</b> <br>";
echo "O veículo possui licenciamento: <b>$licenciado</b> <br> <hr> ";
echo "Cadastro do Automóvel realizado com sucesso";

$con = mysqli_connect("localhost", "root","") or
die("Erro na conexão com Servidor MYSQL");

$db = mysqli_select_db($con, "autocompany_concessionaria") or
die("Erro na abertura do banco de dados: " . mysqli_error($con) );

$sql = "INSERT INTO automoveis (fabricante, modelo, placa, cor, ano, uf, montadora, cambioAutomatico, combustivel, km, licenciado) VALUES ('$fabricante', '$modelo', '$placa', '$cor', '$ano', '$uf', '$montadora', '$cambioAutomatico', '$combustivel', '$km', '$licenciado')";

mysqli_query($con, $sql) or
die("Erro na inserção de registro do Automóvel: " . mysqli_error($con) );

$rs = mysqli_query($con, "SELECT LAST_INSERT_ID() FROM automoveis");
$dados = mysqli_fetch_array($rs);
$idCriado = $dados[0];
echo "<hr>";
echo "Registro $idCriado inserido na tabela Automoveis";

?>
</body>
</html>