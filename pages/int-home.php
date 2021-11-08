<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
</head>

<body>
  <?php include("../functions/processos.php"); ?>

  <a href="../pages/ciclo_page.php">Ciclo</a>
  <a href="../pages/cadastro-recebidos_page.php">Recebidos</a>
  <a href="../pages/cadastro-despesas_page.php">Pagamentos</a>
  <a href="../pages/cadastro-conta_page.php">Conta bancária</a>
  <a href="../pages/safra_page.php"> Safra</a>
  <a href="../pages/.php"></a>

  <br><br>

  <!-- Mostrar o lucro total da operação -->
  <h4>Lucro Total</h4>
  <?php
    echo"$lucroTotal";
  ?>
  <br><br>

  <!-- Mostrar o saldo atual  -->
  <h4>Saldo Atual</h4>
  <?php
    echo"$saldo";
  ?>

  <div id="curve_chart" style="width: 900px; height: 500px"></div>
</body>

</html>