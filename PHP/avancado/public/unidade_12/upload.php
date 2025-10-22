<?php require_once("../../conexao/conexao.php");
include_once("../_incluir/funcoes.php");

// Verifica se o formulário foi enviado
if ($_SERVER['CONTENT_LENGTH'] > ini_get('post_max_size')) {
    $mensagem = "Arquivo muito grande. Tamanho máximo permitido: " . ini_get('upload_max_filesize');
} else if (!isset($_FILES['arquivo'])) {
    $mensagem = "Nenhum arquivo enviado ou arquivo excede o limite.";
} else {
    $resposta = uploadArquivo($_FILES['arquivo']);
    $mensagem = $resposta[0];
    echo $nome_arquivo = $resposta[1];
}

?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP Integração com MySQL</title>

    <!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
    <link href="_css/crud.css" rel="stylesheet">
    <style>
        input {
            display: block;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php include_once("../_incluir/topo.php"); ?>
    <?php include_once("../_incluir/funcoes.php"); ?>

    <main>
        <div id="janela_formulario">
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <h2>Upload de Arquivos</h2>

                <input type="hidden" name="MAX_FILE_SIZE" value="5000000">

                <label for="arquivo">Selecione o arquivo:</label>
                <input type="file" name="arquivo" id="arquivo" required>

                <input type="submit" value="Enviar" name="enviar">
                <?php
                if (isset($mensagem)) {
                    echo "<p class='mensagem'>$mensagem</p>";
                }
                ?>
        </div>
    </main>

    <?php include_once("../_incluir/rodape.php"); ?>
</body>

</html>

<?php
// Fechar conexao
mysqli_close($con);
?>