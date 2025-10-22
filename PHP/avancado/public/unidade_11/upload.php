<?php require_once("../../conexao/conexao.php");

$array_erro = array(
    UPLOAD_ERR_OK => "Sem erro.",
    UPLOAD_ERR_INI_SIZE => "O arquivo enviado excede o limite definido na diretiva upload_max_filesize do php.ini.",
    UPLOAD_ERR_FORM_SIZE => "O arquivo excede o limite definido em MAX_FILE_SIZE no formulário HTML",
    UPLOAD_ERR_PARTIAL => "O upload do arquivo foi feito parcialmente.",
    UPLOAD_ERR_NO_FILE => "Nenhum arquivo foi enviado.",
    UPLOAD_ERR_NO_TMP_DIR => "Pasta temporária ausente.",
    UPLOAD_ERR_CANT_WRITE => "Falha em escrever o arquivo em disco.",
    UPLOAD_ERR_EXTENSION => "Uma extensão do PHP interrompeu o upload do arquivo."
);

if (!isset($_POST["enviar"])) {
    echo "Nenhum arquivo selecionado.";
} else {
    $arquivo = $_FILES["arquivo"];

    // Verifica se houve erro no upload
    if ($arquivo['error'] !== UPLOAD_ERR_OK) {
        die("Erro ao enviar o arquivo: " . $arquivo['error']);
    }

    // Define o diretório de destino
    $diretorio_destino = "./uploads/";

    // Verifica se o diretório existe, caso contrário, cria
    if (!is_dir($diretorio_destino)) {
        mkdir($diretorio_destino, 0777, true);
    }

    // Move o arquivo para o diretório de destino
    $caminho_arquivo = $diretorio_destino . basename($arquivo["name"]);

    if (move_uploaded_file($arquivo["tmp_name"], $caminho_arquivo)) {
        $mensagem = "Arquivo enviado com sucesso: " . htmlspecialchars(basename($arquivo["name"]));
    } else {
        $mensagem = "Erro ao mover o arquivo para o diretório de destino.";
        exit;
    }
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
mysqli_close($conecta);
?>