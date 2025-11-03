<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP com AJAX</title>

</head>

<body>
    <div></div>
    <script src="jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'dados.txt',
                type: 'GET',
                success: function(response) {
                    $('div').load('dados.txt');
                },
                error: function() {
                    alert('Erro na requisição AJAX.');
                }
            });
        });
    </script>

</body>

</html>