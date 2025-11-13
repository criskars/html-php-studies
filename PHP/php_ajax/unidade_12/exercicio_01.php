<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP com AJAX</title>
    </head>

    <body>

        
        <script src="_js/jquery-3.7.1.min.js"></script>
        <script>
            var cep = '80210390';
            $.ajax({
                url: 'https://viacep.com.br/ws/' + cep + '/json/',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                },
                error: function(err) {
                    console.log('Erro na requisição: ' + err);
                }
            });
        </script>
    </body>
</html>