<?php require_once("../../conexao/conexao.php");
// Consulta ao banco de dados
$produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena FROM produtos";
$lista_produtos = mysqli_query($con, $produtos);
if (!$lista_produtos) {
    die("Falha na consulta ao banco de dados");
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
    <link href="_css/produtos.css" rel="stylesheet">
</head>

<body>
    <?php include_once("../_incluir/topo.php"); ?>
    <?php include_once("../_incluir/funcoes.php"); ?>

    <main>
        <div id="listagem_produtos">
            <ul>
                <?php while ($linha = mysqli_fetch_assoc($lista_produtos)) {
                    echo "<li class='imagem'>";
                    echo "<img src=" . $linha["imagempequena"] . "></li>";
                    echo "<li><h3>" . $linha["nomeproduto"] . "</h3></li>";
                    echo "<li>" . $linha["tempoentrega"] . " dias úteis </li>";
                    echo "<li>R$ " .  number_format($linha["precounitario"], 2, ",", ".") . "</li>";
                }
                ?>
            </ul>
        </div>
    </main>

    <?php include_once("../_incluir/rodape.php"); ?>
</body>

</html>

<?php
// Fechar conexao
mysqli_close($con);
?>