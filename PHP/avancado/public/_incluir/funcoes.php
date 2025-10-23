<?php
function real_format($valor)
{
    $valor  = number_format($valor, 2, ",", ".");
    return "R$ " . $valor;
}
function mostrarAviso($mensagem)
{
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
    if (isset($array_erro[$mensagem])) {
        return $array_erro[$mensagem];
    } else {
        return "Erro desconhecido.";
    }
}
function uploadArquivo($arquivo_publicado)
{
    // Processar upload normalmente
    $extensao = pathinfo($arquivo_publicado["name"], PATHINFO_EXTENSION);

    // Verifica se houve erro no upload
    if ($arquivo_publicado['error'] !== UPLOAD_ERR_OK) {
        $mensagem = "Erro ao enviar o arquivo: " . mostrarAviso($arquivo_publicado['error']);
    } else {

        // Verifica a extensão do arquivo
        if (!in_array($extensao, array("jpg", "jpeg", "png", "gif", "pdf", "docx"))) {
            $mensagem = "Tipo de arquivo não permitido. Apenas arquivos JPG, PNG, GIF, PDF e DOCX são aceitos.";
        } else {

            // Define o diretório de destino
            $diretorio_destino = "./images/product_images/";

            // Verifica se o diretório existe, caso contrário, cria
            if (!is_dir($diretorio_destino)) {
                mkdir($diretorio_destino, 0777, true);
            }

            $nome_arquivo = alterarNome($arquivo_publicado["name"]);
            // Define o diretório de destino completo com o nome do arquivo
            $caminho_arquivo = $diretorio_destino . $nome_arquivo;

            // Verifica se conseguiu ou não mover o arquivo
            if (move_uploaded_file($arquivo_publicado["tmp_name"], $caminho_arquivo)) {
                $mensagem = "Arquivo enviado com sucesso: " . htmlspecialchars($nome_arquivo);
            } else {
                $mensagem = "Erro ao mover o arquivo para o diretório de destino.";
            }
        }
    }
    return array($mensagem, $nome_arquivo);
}
function alterarNome($arquivo)
{
    $extensao = pathinfo($arquivo, PATHINFO_EXTENSION);
    $alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    $tamanho = 15;
    $letra = "";
    $resultado = "";
    for ($i = 1; $i <= $tamanho; $i++) {
        $rand = rand(0, strlen($alfabeto) - 1);
        $letra = substr($alfabeto, $rand, 1);
        $resultado .= $letra;
    }
    $agora = getdate();
    $codigo_ano = $agora["year"];
    $codigo_data = $agora["hours"] . $agora["minutes"] . $agora["seconds"];
    return "foto_" . $resultado . "_" . $codigo_ano . "_" . $agora["yday"] . "_" . $codigo_data . "." . $extensao;
}
function enviarMensagem($dados)
{
    // Extrair dados do formulário
    $nome = $dados['nome'];
    $email = $dados['email'];
    $mensagem = $dados['mensagem'];

    // Configurar email
    $destino = "cristian.astronomic@yahoo.com.br";
    $remetente = "crisale.karsten@gmail.com";
    $assunto = "Contato pelo site";

    // Montar corpo do email
    $corpo = "Nome: " . $nome . "\n" . "Email: " . $email . "\n" . "Mensagem: " . $mensagem . "\n";

    // Enviar email
    $headers = "From: " . $remetente . "\r\n" .
        "Reply-To: " . $remetente . "\r\n" .
        "X-Mailer: PHP/" . phpversion();
    return mail($destino, $assunto, $corpo, $headers, "-f$remetente");
}
