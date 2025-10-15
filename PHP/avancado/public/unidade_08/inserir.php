<?php require_once("../../conexao/conexao.php"); 
    if (isset($_POST["nometransportadora"])) {
        $nometransportadora = $_POST["nometransportadora"];
        $endereço = $_POST["endereço"];
        $estadoID = $_POST["estado"];
        $cidade = $_POST["cidade"];
        $telefone = $_POST["telefone"];
        $cep = $_POST["cep"];
        $cnpj = $_POST["cnpj"];

        $inserir = "INSERT INTO transportadoras ";
        $inserir .= "(nometransportadora, endereco, cidade, estadoID, telefone, cep, cnpj) ";
        $inserir .= "VALUES ";
        $inserir .= "('$nometransportadora', '$endereço', '$cidade', $estadoID, '$telefone', '$cep', '$cnpj') ";

        $operacao_inserir = mysqli_query($con, $inserir);
        if (!$operacao_inserir) {
            die("Erro no banco");
        } else {
            header("location:listagem.php");
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
</head>

<body>
    <?php include_once("../_incluir/topo.php"); ?>
    <?php include_once("../_incluir/funcoes.php"); ?>

    <main>
        <div id="janela_formulario">
            <form action="inserir.php" method="post">
                <input type="text" name="nometransportadora" placeholder="Nome da transportadora" required>
                <input type="text" name="endereço" placeholder="Endereço" required>
                <select name="estado">
                    <option value="">Selecione o estado</option>
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
                </select>
                <select name="cidade">
                    <option value="">Selecione a cidade</option>
                    <script>
                        document.getElementsByName("estado")[0].addEventListener("change", function() {
                            var sigla = this.options[this.selectedIndex].getAttribute("data-sigla");
                            var cidadeSelect = document.getElementsByName("cidade")[0];
                            cidadeSelect.innerHTML = '<option value="">Carregando...</option>';
                            fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + sigla + "/municipios")
                                .then(response => response.json())
                                .then(data => {
                                    cidadeSelect.innerHTML = '<option value="">Selecione uma cidade</option>';
                                    data.forEach(cidade => {

                                        cidadeSelect.innerHTML += `<option value="${cidade.nome}">${cidade.nome}</option>`;
                                    });
                                })
                                .catch(error => console.error('Erro ao carregar as cidades:', error));
                        });
                    </script>
                </select>
                <input type="text" name="telefone" placeholder="Telefone" required>
                <input type="text" name="cep" placeholder="CEP" required>
                <input type="text" name="cnpj" placeholder="CNPJ" required>
                <input type="submit" value="Inserir transportadora">
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