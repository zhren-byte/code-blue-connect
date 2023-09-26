<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="./chart.css">
</head>
<body>

    <label for="rango-temporal">Rango temporal</label>
    <select name="rango-temporal" class="time-select">
        <option value="week">Última semana</option>
        <option value="month">Último mes</option>
        <option value="trimester">Últimos tres meses</option>
    </select>

    <div class="chart-wrapper">
        <canvas id="myChart"></canvas>
    </div>

    <script src="./chart.js"></script>
</body>
</html>