<?php
header("Access-Control-Allow-Origin: *");
$conecta = mysqli_connect("localhost", "root", "", "website");
if (mysqli_connect_errno()) {
    die("Conexão falhou: " . mysqli_connect_errno());
}
$consulta = "SELECT nomeproduto, precounitario, imagempequena FROM produtos";
$resultado = mysqli_query($conecta, $consulta);
$retorno = array();
while ($registro = mysqli_fetch_object($resultado)) {
    $retorno[] = $registro;
}

echo json_encode($retorno);

mysqli_close($conecta);

?>