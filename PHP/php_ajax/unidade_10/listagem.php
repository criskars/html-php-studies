<?php
// Criar objeto de conexao
$conecta = mysqli_connect("localhost", "root", "", "website");
if (mysqli_connect_errno()) {
    die("Conexao falhou: " . mysqli_connect_errno());
}

// tabela de transportadoras
$tr = "SELECT * FROM transportadoras ";
$consulta_tr = mysqli_query($conecta, $tr);
if (!$consulta_tr) {
    die("erro no banco");
}
?>

<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Curso PHP INTEGRACAO</title>

    <!-- estilo -->
    <link href="_css/estilo.css" rel="stylesheet">
</head>

<body>
    <main>
        <div id="janela_transportadoras">
            <?php
            while ($linha = mysqli_fetch_assoc($consulta_tr)) {
            ?>
                <ul id="<?php echo $linha["transportadoraID"] ?>">
                    <li><?php echo $linha["nometransportadora"] ?></li>
                    <li><?php echo $linha["cidade"] ?></li>
                    <li><a href="" class="excluir">Excluir</a></li>
                </ul>
            <?php
            }
            ?>
        </div>
    </main>


    <script src="jquery.js"></script>
    <script>
        // aguardar carregamento total da pagina
        $(document).ready(function() {
            // selecionar todos os links com a classe excluir
            $(".excluir").click(function() {
                // evitar o comportamento padrao do link
                event.preventDefault();

                // armazenar o elemento clicado na variavel
                var elemento = $(this);

                // encontrar o transportadoraID do elemento clicado
                var transportadoraID = elemento.parent().parent().attr("id");

                // enviar o transportadoraID via ajax para exclusao.php
                $.post("exclusao.php", {
                    transportadoraID: transportadoraID
                }, function(retorno) {
                    json = JSON.parse(retorno);

                    // verificar se excluiu com sucesso
                    if (json.sucesso) {
                        // remover a ul do transportadora excluido
                        elemento.parent().parent().fadeOut();
                        alert(json.mensagem);
                    } else {
                        alert(json.mensagem);
                    }
                });
            });
        });
    </script>
</body>

</html>

<?php
// Fechar conexao
mysqli_close($conecta);
?>