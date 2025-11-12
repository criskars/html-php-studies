<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
        <script>
            function retornarProdutos(produtos) {
                for (var i = 0; i < produtos.length; i++) {
                    document.write("Produto: " + produtos[i].nomeproduto + " - Preço: R$ " + produtos[i].precounitario + "<br>");
                }
            }
        </script>
     
    </head>

    <body>
        <script src="http://localhost/php_ajax/unidade_07/gerar_json.php?callback=retornarProdutos"></script>
    </body>
</html>