<?php require_once("../../conexao/conexao.php");

$transp = "SELECT * FROM transportadoras ";
$transportadoraID = $_GET["codigo"];

if (isset($_GET["codigo"])) {
    $transp .= "WHERE transportadoraID = $transportadoraID ";
} else {
    header("location:listagem.php");
}

if (isset($_POST["nometransportadora"])) {
    print_r($_POST);
    $nometransportadora = $_POST["nometransportadora"];
    $endereço = $_POST["endereco"];
    $estadoID = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $telefone = $_POST["telefone"];
    $cep = $_POST["cep"];
    $cnpj = $_POST["cnpj"];
    $transportadoraID = $_POST["transportadoraID"];

    $alterar = "UPDATE transportadoras SET ";
    $alterar .= "nometransportadora = '$nometransportadora', ";
    $alterar .= "endereco = '$endereço', ";
    $alterar .= "cidade = '$cidade', ";
    $alterar .= "estadoID = $estadoID, ";
    $alterar .= "telefone = '$telefone', ";
    $alterar .= "cep = '$cep', ";
    $alterar .= "cnpj = '$cnpj' ";
    $alterar .= "WHERE transportadoraID = $transportadoraID";
    echo $alterar;

    $operacao_alterar = mysqli_query($con, $alterar);
    if (!$operacao_alterar) {
        die(mysqli_error($con));
    } else {
        header("location:listagem.php");
    }
}

$consulta_transp = mysqli_query($con, $transp);
if (!$consulta_transp) {
    die("Erro no banco");
} else {
    $dados_transp = mysqli_fetch_assoc($consulta_transp);
}


?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP Integração com MySQL</title>

    <!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
    <link href="_css/alteracao.css" rel="stylesheet">
</head>

<body>
    <?php include_once("../_incluir/topo.php"); ?>
    <?php include_once("../_incluir/funcoes.php"); ?>

    <main>
        <div id="janela_formulario">
            <form action="alteracao.php" method="post">
                <label for="nometransportadora">Nome da transportadora</label>
                <input type="text" name="nometransportadora" id="nometransportadora" value="<?php echo $dados_transp["nometransportadora"]; ?>" required>
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" value="<?php echo $dados_transp["endereco"]; ?>" required>
                <label for="estado">Estado</label>
                <select name="estado" id="estado">
                    <?php
                    $consulta = "SELECT * FROM estados";
                    $conecta = mysqli_query($con, $consulta);
                    if (!$conecta) {
                        die("Erro na consulta ao banco");
                    }
                    while ($linha = mysqli_fetch_assoc($conecta)) {
                    ?>
                        <option value="<?php echo $linha["estadoID"]; ?>" data-sigla="<?php echo $linha["sigla"]; ?>">
                            <?php echo $linha["nome"];
                            ?>
                        </option>
                    <?php
                    }
                    mysqli_free_result($conecta);
                    ?>
                    <script>
                        document.getElementById('estado').value = "<?php echo $dados_transp["estadoID"]; ?>";
                    </script>
                </select>
                <label for="cidade">Cidade</label>
                <select name="cidade" id="cidade">
                    <option value="">Selecione a cidade</option>
                    <script>
                        function carregarCidades() {
                            var estadoSelect = document.querySelector('select[name="estado"]');
                            var optionSelecionada = estadoSelect.options[estadoSelect.selectedIndex];
                            var sigla = optionSelecionada.getAttribute("data-sigla");
                            var cidadeSelect = document.getElementsByName("cidade")[0];
                            cidadeSelect.innerHTML = '<option value="">Carregando...</option>';
                            fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + sigla + "/municipios")
                                .then(response => response.json())
                                .then(data => {
                                    cidadeSelect.innerHTML = '<option value="">Selecione a cidade</option>';
                                    data.forEach(cidade => {
                                        cidadeSelect.innerHTML += `<option value="${cidade.nome}">${cidade.nome}</option>`;
                                    });
                                    document.getElementById('cidade').value = "<?php echo $dados_transp["cidade"]; ?>";
                                })
                                .catch(error => console.error('Erro ao carregar as cidades:', error));
                        }
                        document.addEventListener("DOMContentLoaded", carregarCidades);
                        document.getElementsByName("estado")[0].addEventListener("change", carregarCidades);
                        document.getElementById('cidade').textContent = "<?php echo $dados_transp["cidade"]; ?>";
                    </script>
                </select>
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" value="<?php echo $dados_transp["telefone"]; ?>" required>
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" value="<?php echo $dados_transp["cep"]; ?>" required>
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" value="<?php echo $dados_transp["cnpj"]; ?>" required>
                <input type="hidden" name="transportadoraID" value="<?php echo $dados_transp["transportadoraID"]; ?>">
                <input type="submit" value="Alterar transportadora">
            </form>
        </div>
    </main>

    <?php include_once("../_incluir/rodape.php"); ?>
</body>

</html>

<?php
// Fechar conexao
mysqli_close($con);
?>