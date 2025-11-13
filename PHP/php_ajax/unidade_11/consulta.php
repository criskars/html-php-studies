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
            <form id="pesquisarProdutos">
                <label for="categorias">Categorias</label>
                <select id="categorias">
                </select>
                <label for="produtos">Produtos</label>
                <select id="produtos">
                </select>
            </form>
        </div>
        <div id="resultado">
        </div>
    </main>


    <script src="_js/jquery-3.7.1.min.js"></script>
    <script>
        function retornarCategorias(data) {
            var select = $('#categorias');
            select.empty();
            select.append('<option value="">Escolha uma categoria</option>');
            $.each(data, function(i) {
                select.append('<option value="' + data[i].categoriaID + '">' + data[i].nomecategoria + '</option>');
            })
        }
        retornarProdutos = function(categoriaID) {
            $.ajax({
                url: 'http://localhost/php_ajax/unidade_11/retornar_produtos.php',
                type: 'GET',
                data: {
                    "categoriaID": categoriaID
                },
                success: function(data) {
                    var produtos = '';
                    var selectProdutos = $('#produtos');
                    selectProdutos.empty();
                    selectProdutos.append('<option value="">Escolha um produto</option>');
                    $.each($.parseJSON(data), function() {
                        produtos += '<option value="' + arguments[1].produtoID + '">' + arguments[1].nomeproduto + '</option>'
                    });
                    selectProdutos.append(produtos);
                }
            });
        };
        $("#categorias").on('change', function() {
            var categoriaID = $(this).val();
            retornarProdutos(categoriaID);
        });
    </script>
    <script src="http://localhost/php_ajax/unidade_11/retornar_categorias.php?callback=retornarCategorias"></script>
    <script src="http://localhost/php_ajax/unidade_11/retornar_produtos.php?callback=retornarProdutos"></script>
</body>
</body>

</html>