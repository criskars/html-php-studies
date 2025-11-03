<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
    </head>

    <body>

        <script src="jquery-3.7.1.min.js"></script>
        <script>
            $.ajax({
                url: 'nome.php'
            }).done(function(response) {
                $('body').append('<div>' + response + '</div>');
            }).fail(function(response) {
                alert('Erro na requisição AJAX.' + response.responseText);
            }).always(function() {
                $('body').append('<div> Requisição concluída.</div>');
            });
        </script>
    </body>
</html>