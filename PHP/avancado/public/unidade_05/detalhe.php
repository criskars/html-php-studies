<?php require_once("../../conexao/conexao.php");
if (isset($_GET["codigo"])) {
    $produtoID = $_GET["codigo"];
} else {
    Header("location: listagem.php");
}

// Determinar localidade BR
setlocale(LC_ALL, 'pt_BR');
// Consulta ao banco de dados
$produtos = "SELECT * ";
$produtos .= "FROM produtos ";
$produtos .= "WHERE produtoID = {$produtoID} ";
$resultado = mysqli_query($con, $produtos);
if (!$resultado) {
    die("Falha na consulta ao banco");
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Curso PHP Integração com MySQL</title>

    <!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
</head>

<body>
    <?php include_once("../_incluir/topo.php"); ?>
    <?php include_once("../_incluir/funcoes.php"); ?>

    <main>
        <?php
        $product_details = mysqli_fetch_assoc($resultado);
        echo "<img class='pdpimage' src='" . $product_details["imagemgrande"] . "'>";
        echo "<div class='pdptext'><h2>" . $product_details["nomeproduto"] . "</h2>";
        echo "<p><strong>Descrição do produto: </strong>" . $product_details["descricao"] . "</p>";
        echo "<p><strong>Código de barras: </strong>" . $product_details["codigobarra"] . "</p>";
        echo "<p><strong>Tempo de entrega: </strong>" . $product_details["tempoentrega"] . " dias úteis.</p>";
        echo "<p><strong>Preço de revenda: </strong>" . real_format($product_details["precorevenda"]) . "</p>";
        echo "<p><strong>Preço unitário: </strong>" . real_format($product_details["precounitario"]) . "</p>";
        echo "<p>Temos: " . $product_details["estoque"] . " unidades disponíveis.</p></div>";
        ?>
    </main>

    <?php include_once("../_incluir/rodape.php"); ?>
</body>

</html>

<?php
// Fechar conexao
mysqli_close($con);
?>