<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php 
    session_start(); 
    include '../functions/conexao.php';
    $email = $_SESSION['email'];
    $ID = $_SESSION['id'];
    $id = implode($ID[0]);
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ciclo</title>
</head>

<body>

  <?php
    // Checar se o usuário tem algum ciclo cadastrado, usar o script para mudar a classe de estilo
    $cicloChecker = mysqli_query($conexao, "SELECT * FROM ciclo WHERE Id_Cad = '$id'");
    if (mysqli_num_rows($cicloChecker) > 0) {
      echo"<script></script>";
      $stmt = $pdo->prepare("SELECT * FROM ciclo WHERE Id_Cad = '$id'");
      $stmt->execute();
      $CICLO = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach($CICLO as $ciclo) {
        echo <<<EOT
        <h4>Ciclo</h4>
        EOT;
        echo("Nome do ciclo: $ciclo[Nome_Ciclo] <br>");
        echo("Cultura: $ciclo[Cultura] <br>");
        echo("Receita esperada: $ciclo[Receita_Esperada] <br>");
        $lucroCiclo = $ciclo["Recebidos"] - $ciclo["Despesas"];
        echo("Lucro obtido: $lucroCiclo");
      }
  
      // for ($i=0; $i < mysqli_num_rows($cicloChecker); $i++) { 
      //   $ciclo = implode(" - ", $CICLO[$i]);
      //   echo <<<EOT
      //     <h4>Ciclo</h4>
      //     EOT;
      //     echo nl2br("$ciclo");
      //     echo <<<EOT
      //     <p>Teste</p>
      //     EOT;
      // }
    } else {
      echo "<script></script>";
    }

  ?>

  <form action="cadastro-ciclo_page.php">
    <button>Cadastrar novo</button>
  </form>

</body>

</html>