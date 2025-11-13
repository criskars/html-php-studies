<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP com AJAX</title>

    <link href="_css/estilo.css" rel="stylesheet">
</head>

<body>
    <main>
        <div id="janela_formulario">

            <form id="formulario_transportadora">
                <label for="nometransportadora">Nome da Transportadora</label>
                <input type="text" value="" name="nometransportadora" id="nometransportadora">

                <label for="cep">CEP (ex: 58000-100)</label>
                <input type="text" value="" name="cep" id="cep" maxlength="9">

                <label for="endereco">Endereço</label>
                <input type="text" value="" name="endereco" id="endereco">

                <label for="cidade">Cidade</label>
                <input type="text" value="" name="cidade" id="cidade">

                <label for="estado">Estado</label>
                <input type="text" value="" name="estado" id="estado">

                <label for="bairro">Bairro</label>
                <input type="text" value="" name="bairro" id="bairro">

                <input type="submit" value="Confirmar alteração">

                <div id="mensagem">
                    <p></p>
                </div>
            </form>

        </div>
    </main>

    <script src="_js/jquery-3.7.1.min.js"></script>
    <script>
        $('#cep').on('blur', function() {
            var cep = $(this).val().replace(/\D/g, '');
            if (cep !== "") {
                var validacep = /^[0-9]{8}$/;
                if (validacep.test(cep)) {
                    $.ajax({
                        url: 'https://viacep.com.br/ws/' + cep + '/json/',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (!("erro" in data)) {
                                $('#endereco').val(data.logradouro);
                                $('#bairro').val(data.bairro);
                                $('#cidade').val(data.localidade);
                                $('#estado').val(data.uf);
                            } else {
                                limparFormulario();
                                $("#mensagem").show();
                                $("#mensagem p").text("CEP não encontrado.");
                            }
                        },
                        error: function() {
                            limparFormulario();
                            $("#mensagem").show();
                            $("#mensagem p").text("Erro ao consultar o CEP.");
                        }
                    });
                } else {
                    limparFormulario();
                    $("#mensagem").show();
                    $("#mensagem p").text("Formato de CEP inválido.");
                }
            } else {
                limparFormulario();
            }
        });

        function limparFormulario() {
            $('#endereco').val("");
            $('#bairro').val("");
            $('#cidade').val("");
            $('#estado').val("");
        }
    </script>
</body>

</html>