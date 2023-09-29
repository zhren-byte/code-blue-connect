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

    <script>const ctx = document.getElementById('myChart');
const timeSelect = document.querySelector(".time-select");

const weekOption = {
    labels: ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
    datasets: [
        {
            label: 'Pacientes atendidos',
            data: [13, 20, 7, 15, 9, 3, 2],
        },
        {
            label: 'Tiempo de respuesta promedio (s)',
            data: [13, 5, 2, 1.5, 3.5, 5, 2.3],
        }
    ]
};

const monthOption = {
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
    datasets: [{
        label: 'Pacientes atendidos',
        data: [120, 92, 54, 123, 233, 75, 132, 175, 103, 85, 92, 63],
    }]
};

let temporalOption = weekOption;
let chart;

// Función para inicializar el gráfico
function initializeChart(dataOption) {
    if (chart) {
        chart.destroy(); // Destruir el gráfico existente si hay uno
    }

    chart = new Chart(ctx, {
        type: 'bar',
        data: dataOption,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
}

// Llamar a la función para inicializar el gráfico con weekOption por defecto
initializeChart(temporalOption);

timeSelect.addEventListener("change", e => {
    if (e.target.value === "week") {
        temporalOption = weekOption;
    } else if (e.target.value === "month") {
        temporalOption = monthOption;
    }

    // Llamar a la función para actualizar el gráfico con la nueva opción
    initializeChart(temporalOption);
});
</script>
</body>
</html>