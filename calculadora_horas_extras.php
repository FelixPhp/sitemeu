<?php
function calcularDiferencaHoras($entrada, $saida) {
    $horaEntrada = DateTime::createFromFormat('H:i', $entrada);
    $horaSaida = DateTime::createFromFormat('H:i', $saida);
    
    if ($horaSaida < $horaEntrada) {
        // Caso o expediente vá além da meia-noite
        $horaSaida->modify('+1 day');
    }

    $intervalo = $horaEntrada->diff($horaSaida);
    return $intervalo->h + $intervalo->i / 60;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Calculadora de Horas Extras</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #000;
            font-family: Arial, sans-serif;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #1c1c1c;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255,255,255,0.1);
            width: 100%;
            max-width: 400px;
        }
        h2, h3 {
            text-align: center;
            color: #00ff99;
        }
        label {
            display: block;
            margin-bottom: 5px;
            margin-top: 15px;
        }
        input, select, button {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: none;
            margin-bottom: 10px;
        }
        input, select {
            background-color: #2b2b2b;
            color: #fff;
        }
        button {
            background-color: #00ff99;
            color: #000;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #00cc77;
        }
        .resultado {
            margin-top: 20px;
            background-color: #111;
            padding: 15px;
            border-radius: 8px;
        }
    </style>

</head>
<body>
    <h2>Calculadora de Horas Extras</h2>
    <form method="post">
        <label>Hora de Entrada:</label>
        <input type="time" name="entrada" required><br><br>

        <label>Hora de Saída:</label>
        <input type="time" name="saida" required><br><br>

        <label>Jornada Diária (em horas):</label>
        <input type="number" name="jornada" value="8" required><br><br>

        <label>Adicional de Hora Extra (%):</label>
        <select name="adicional">
            <option value="50">50%</option>
            <option value="100">100%</option>
        </select><br><br>

        <label>Salário Mensal (R$):</label>
        <input type="number" step="0.01" name="salario" required><br><br>

        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $entrada = $_POST['entrada'];
        $saida = $_POST['saida'];
        $jornada = floatval($_POST['jornada']);
        $adicional = intval($_POST['adicional']);
        $salario = floatval($_POST['salario']);

        $horasTrabalhadas = calcularDiferencaHoras($entrada, $saida);
        $horasExtras = max(0, $horasTrabalhadas - $jornada);

        $valorHora = $salario / 220; // Média padrão mensal
        $valorHoraExtra = $valorHora * (1 + $adicional / 100);
        $valorTotalExtras = $horasExtras * $valorHoraExtra;

        echo "<h3>Resultado:</h3>";
        echo "Horas Trabalhadas: <strong>" . number_format($horasTrabalhadas, 2) . " h</strong><br>";
        echo "Horas Extras: <strong>" . number_format($horasExtras, 2) . " h</strong><br>";
        echo "Valor da Hora Extra: <strong>R$ " . number_format($valorHoraExtra, 2, ',', '.') . "</strong><br>";
        echo "Total a Receber de Horas Extras: <strong>R$ " . number_format($valorTotalExtras, 2, ',', '.') . "</strong>";
    }
    ?>
</body>
</html>
