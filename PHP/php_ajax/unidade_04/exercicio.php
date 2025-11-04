<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP com AJAX</title>
</head>

<body>
    <button onclick="loadData()">Carregar Produtos</button>
    <div id="quantidade"></div>
    <div id="listagem"></div>
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="_css/estilo.css">
    <script>
        function loadData () {
            $.ajax({
            url: '_xml/produtos.xml',
            type: 'GET',
            dataType: 'html',
            success: function(data) {
                $('#quantidade').html($(data).find('produto').length + ' produtos encontrados.');
                $('#listagem').html($(data).find('produto').map(function() {
                    return '<p>' + $(this).find('nomeproduto').text() + ' - R$ ' + $(this).find('precounitario').text() + '</p>';
                }).get().join(''));
                $('#quantidade').show();
                $('#listagem').show();
            },
            error: function(xhr, status, error) {
                $('#listagem').html('Erro ao carregar os dados: ' + error);
            }
        });
        }
    </script>
</body>

</html>