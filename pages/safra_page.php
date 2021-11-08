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
  <title>Safra</title>
</head>

<body>

  <?php
    // Checar se o usuário tem algum safra cadastrado, usar o script para mudar a classe de estilo
    $safraChecker = mysqli_query($conexao, "SELECT * FROM safra WHERE Id_Cad = '$id'");
    if (mysqli_num_rows($safraChecker) > 0) {
      echo"<script></script>";
      $recebidos_soma = 0;
    
      $stmt = $pdo->prepare("SELECT * FROM safra WHERE Id_Cad = '$id'");
      $stmt->execute();
      $SAFRA = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
      foreach ($SAFRA as $safra) {
        echo <<<EOT
        <h4>Safra</h4>
        EOT;
        echo ("$safra[Safra] <br>");  
        echo ("Recebidos: $safra[Recebidos] <br>");
        echo ("Despesas: $safra[Despesas] <br>");
        $lucroSafra = $safra["Recebidos"] - $safra["Despesas"];
        echo ("Lucro: $lucroSafra");
        echo <<<EOT
        <p></p>
        EOT;
      }
    } else {
      echo "<script></script>";
    }
    ?>

  <form action="cadastro-safra_page.php">
    <button>Cadastrar novo</button>
  </form>

</body>

</html>