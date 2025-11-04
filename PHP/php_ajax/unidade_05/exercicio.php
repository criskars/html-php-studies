<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP com AJAX</title>
</head>

<body>
    <button>Carregar Produtos</button>
    <div id="quantidade"></div>
    <div id="listagem"></div>
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="_css/estilo.css">
    <script>
        $('button').click(function() {
            loadData();
        });
        function loadData () {
            $.getJSON('_json/produtos.json', function(data) {
                $('#quantidade').html('Quantidade de produtos: ' + data.length);
                $.each(data, function(index, produto) {
                    $('#listagem').append('<p> Nome do produto: ' + produto.nomeproduto + ' - R$ ' + produto.precounitario + '</p>');
                }); 
            })
        $('#listagem').show();
        $('#quantidade').show();
        };
    </script>
</body>

</html>