<?php require_once("../../conexao/conexao.php"); ?>

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
            <form action="inserir.php" method="post">
                <label for="nometransportadora">Nome da transportadora</label>
                <input type="text" name="nometransportadora" id="nometransportadora" required>
                <label for="endereço">Endereço</label>
                <input type="text" name="endereço" id="endereço" required>
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
                </select>
                <label for="cidade">Cidade</label>
                <select name="cidade" id="cidade">
                    <option value="">Selecione a cidade</option>
                    <script>
                        document.getElementsByName("estado")[0].addEventListener("change", function() {
                            var sigla = this.options[this.selectedIndex].getAttribute("data-sigla");
                            var cidadeSelect = document.getElementsByName("cidade")[0];
                            fetch("https://servicodados.ibge.gov.br/api/v1/localidades/estados/" + sigla + "/municipios")
                                .then(response => response.json())
                                .then(data => {
                                    data.forEach(cidade => {
                                        cidadeSelect.innerHTML += `<option value="${cidade.nome}">${cidade.nome}</option>`;
                                    });
                                })
                                .catch(error => console.error('Erro ao carregar as cidades:', error));
                        });
                    </script>
                </select>
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" id="telefone" required>
                <label for="cep">CEP</label>
                <input type="text" name="cep" id="cep" required>
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" id="cnpj" required>
                <input type="hidden" name="transportadoraID" value="1">
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