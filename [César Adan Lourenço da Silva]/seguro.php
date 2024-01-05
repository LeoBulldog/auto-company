<html>
    <head>
        <title>Gravando Seguro</title>
    </head>

    <dody>
        <h2>Gravando dados do segruo...</h2>
<?php 
    $nome                   = $_GET["nome"];
    $carroSegurado          = $_GET["carro"];
    $veiculoTabela          = $_GET["tabela"];
    $modelo                 = $_GET["modelo"];
    $placa                  = $_GET["placa"];
    $cidade                 = $_GET["cidade"];
    $enderenco              = $_GET["enderenco"];
    $cep                    = $_GET["cep"];
    $ddd                    = $_GET["ddd"];
    $telefone               = $_GET["telefone"];
    $email                  = $_GET["email"];
    
    if($nome=="")
    {
        die("O nome não pode ficar vazio");
    }

    if($modelo=="")
    {
        die("O modelo do carro deve ser informado!");
    }

    if($cidade=="")
    {
        die("Por gentileza escolha o cidade");
    }

    
    echo "O nome do cliente é <b> $nome </b> <br>";
    echo "motadora: <b> $carroSegurado </b> <br>";
    echo "valor do veiculo: <b>$veiculoTabela </b> <br>";
    echo "modelo: <b> $modelo </b> <br>";
    echo "placa: <b> $placa</b> <hr>";
    echo "cidade: <b> $cidade</b> <hr>";
    echo "enderenco:<b>$enderenco</b> <hr>";
    echo "cep: <b> $cep </b> <hr>";
    echo "ddd:<b> $ddd </b> <hr>";
    echo "telefone: <b> $telefone</b> <hr>";
    echo "email: <b> $email</b> <hr>";


    $con = mysqli_connect ("localhost","root","",);

    
    $db = mysqli_select_db ($con,"autocompany_concessionaria") or 
    die ("Erro na selesão do banco:" . musqli_erroe($con));

    $sql = "INSERT INTO 
    seguro 
        (nome, carroSegurado, veiculoTabela, modelo, placa, cidade, enderenco, cep, ddd, telefone, email)
            VALUES
        ('$nome', '$carroSegurado', '$veiculoTabela', '$modelo', '$placa','$cidade','$enderenco','$cep','$ddd','$telefone','$email')";

    mysqli_query ($con, $sql) or 
    die("Erro na inclusão do cliente" . mysqli_error ($con) );


   echo " <b>$nome</b> cadastrado com sucesso!";

?>
</body>
</html>

