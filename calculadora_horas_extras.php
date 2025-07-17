<?php
function converterHorasParaDecimal($horasMinutos) {
    list($h, $m) = explode(':', $horasMinutos);
    return $h + ($m / 60);
}

function calcularValorHoraExtra($salario, $cargaHorariaMensal, $horasExtras, $percentualExtra) {
    $valorHora = $salario / $cargaHorariaMensal;
    $valorExtra = $valorHora * (1 + ($percentualExtra / 100));
    return $valorExtra * $horasExtras;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Calculadora de Hora Extra</title>
  <style>
    body {
      background-color: #f7f7f7;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .box {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      padding: 30px;
      width: 100%;
      max-width: 700px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 25px;
    }

    .grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
    }

    .form-group label {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 16px;
    }

    .form-group small {
      color: #555;
      margin-top: 4px;
    }

    .form-footer {
      text-align: center;
      margin-top: 30px;
    }

    button {
      background-color: #3366ff;
      color: white;
      border: none;
      padding: 12px 25px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    button:hover {
      background-color: #254eda;
    }

    .resultado {
      margin-top: 30px;
      background-color: #eef;
      padding: 20px;
      border-radius: 8px;
    }
  </style>
</head>
<body>
  <div class="box">
    <h2>Calculadora de Hora Extra</h2>
    <form method="post">
      <div class="grid">
        <div class="form-group">
          <label>Salário bruto</label>
          <input type="number" name="salario" step="0.010,00" placeholder="Ex: 3600" required>
          <small>Salário registrado na carteira (sem descontos).</small>
        </div>

        <div class="form-group">
          <label>Carga horária mensal</label>
          <input type="number" name="carga_horaria" value="220" required>
          <small>Ex: 220h (base comum para 44h semanais).</small>
        </div>

        <div class="form-group">
          <label>% da hora extra</label>
          <input type="number" name="percentual" value="50" required>
          <small>Normal: 50%. Domingos/feriados: 100%.</small>
        </div>

        <div class="form-group">
          <label>Quantidade de horas extras</label>
          <input type="text" name="horas_extras" placeholder="Ex: 10:00" required>
          <small>Formato: hh:mm (horas:minutos).</small>
        </div>
      </div>

      <div class="form-footer">
        <button type="submit">Calcular</button>
      </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $salario = floatval($_POST['salario']);
        $carga = floatval($_POST['carga_horaria']);
        $percentual = floatval($_POST['percentual']);
        $horasTexto = $_POST['horas_extras'];

        $horasExtras = converterHorasParaDecimal($horasTexto);
        $total = calcularValorHoraExtra($salario, $carga, $horasExtras, $percentual);
        $valorHora = $salario / $carga;
        $valorHoraExtra = $valorHora * (1 + $percentual / 100);

        echo "<div class='resultado'>";
        echo "<strong>Horas extras:</strong> " . number_format($horasExtras, 2) . " h<br>";
        echo "<strong>Valor da hora extra:</strong> R$ " . number_format($valorHoraExtra, 2, ',', '.') . "<br>";
        echo "<strong>Total a receber:</strong> R$ " . number_format($total, 2, ',', '.');
        echo "</div>";
    }
    ?>
  </div>
</body>
</html>
