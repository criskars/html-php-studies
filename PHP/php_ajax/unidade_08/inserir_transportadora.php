  <?php
    $conecta = mysqli_connect("localhost", "root", "", "website");
    if (mysqli_connect_errno()) {
        die("Conexao falhou: " . mysqli_connect_errno());
    }

    if (isset($_POST["nometransportadora"])) {
        $nome       = $_POST["nometransportadora"];
        $endereco   = $_POST["endereco"];
        $cidade     = $_POST["cidade"];
        $estado     = $_POST["estados"];

        $inserir    = "INSERT INTO transportadoras ";
        $inserir    .= "(nometransportadora,endereco,cidade,estadoID) ";
        $inserir    .= "VALUES ";
        $inserir    .= "('$nome','$endereco','$cidade', $estado)";
    }
    $retorno = array();

    $operacao_inserir = mysqli_query($conecta, $inserir);

    if (!$operacao_inserir) {
        $retorno["sucesso"] = false;
        $retorno["mensagem"] = "Erro ao inserir transportadora";
    } else {
        $retorno["sucesso"] = true;
        $retorno["mensagem"] = "Transportadora inserida com sucesso!";
    }

    echo json_encode($retorno);
    ?>