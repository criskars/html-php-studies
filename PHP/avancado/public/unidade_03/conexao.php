<?php
require_once("inicial.php");

// passo 3
$consulta_produtos  = "SELECT nomeproduto, precounitario, tempoentrega FROM produtos WHERE tempoentrega = 5";
$produtos = mysqli_query($con, $consulta_produtos);

if (!$produtos) {
    die("Falha na consulta ao banco de dados");
}

?>
<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP Integração com MySQL</title>
</head>

<body>
    <ul>
        <?php
        echo "<h3>Produtos com tempo de entrega igual a 5 dias úteis:</h3>";
        echo "Quantidade de produtos encontrados: " . mysqli_num_rows($produtos) . "<br><br>";
        while ($registro = mysqli_fetch_assoc($produtos)) {
            echo "<li>" . $registro["nomeproduto"] . " - R$ " . $registro["precounitario"] . " - Tempo de entrega: " . $registro["tempoentrega"] . " dias úteis. </li>";
        };
        ?>
    </ul>

    <?php
    mysqli_free_result($produtos);
    ?>

</body>

</html>
<?php
mysqli_close($con);
?>