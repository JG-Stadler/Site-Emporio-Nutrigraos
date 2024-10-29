<!-- 
    $hostName = "localhost";
    $banco = "nutrigraos";
    $usuario = "root";
    $senha = "";
    $mysqli = new mysqli($hostName,$usuario,$senha,$banco)
 -->
 <?php
$hostname = "autorack.proxy.rlwy.net";
$username = "root";
$password = "GooSUHLjbQRgZMmNLpCfpwicXagpNcKL";
$port = "29676";
$databaseName = "railway";

// Criando a conexão
$mysqli = new mysqli($hostname, $username, $password, $databaseName, $port);

// Verificando a conexão
if ($mysqli->connect_error) {
    die("Conexão falhou: " . $mysqli->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}

// Opcional: Fechar a conexão
$mysqli->close();
?>

