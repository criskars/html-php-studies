<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <title>PHP com AJAX</title>
</head>

<body>
    <div id="resultado"></div>
    <script src="_js/jquery-3.7.1.min.js"></script>
    <script>
        $.ajax({
            url: "https://api.open-meteo.com/v1/forecast",
            type: 'POST',
            data: {
                latitude: -26.4861,
                longitude: -49.0667,
                hourly: "temperature_2m",
                timezone: "America/Sao_Paulo"
            },
            success: function(response) {
                var temperatureData = [];
                $.each(response.hourly.temperature_2m, function(index, value) {
                    temperatureData.push(value);
                });
                $.each(response.hourly.time, function(index, value) {
                    $("#resultado").append("Hora " + value + ": " + temperatureData[index] + "°C<br>");
                });
            },
            error: function(xhr, status, error) {
                alert('Erro na requisição: ' + error);
            }
        })
    </script>
</body>

</html>