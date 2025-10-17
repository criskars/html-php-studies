<?php require_once("../../conexao/conexao.php");
if (!isset($_GET["codigo"])) {
    header("location:listagem.php");
}
$transportadoraID = $_GET["codigo"];

$tr = "SELECT * ";
$tr .= "FROM transportadoras ";

if (isset($_GET["codigo"])) {
    $tr .= "WHERE transportadoraID = {$transportadoraID} ";
} else {
    $tr .= "WHERE transportadoraID = 1 ";
}

$con_transportadora = mysqli_query($con, $tr);
if (!$con_transportadora) {
    die("Erro na consulta");
}

$info_transportadora = mysqli_fetch_assoc($con_transportadora);
$nome_transportadora = $info_transportadora['nometransportadora'];

$exclusao = "DELETE FROM transportadoras ";
$exclusao .= "WHERE transportadoraID = $transportadoraID ";

$operacao_exclusao = mysqli_query($con, $exclusao);
if (!$operacao_exclusao) {
    die(mysqli_error($con));
} else {
    header("location:listagem.php");
}
// Fechar conexao
mysqli_close($conecta);
