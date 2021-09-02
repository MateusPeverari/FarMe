<html>
<?php 
    session_start(); 
    include("../functions/functions.php");
    ?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../style/functions.css" rel="stylesheet" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,700;1,300;1,400&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="../style/int-cad_fazenda.css" rel="stylesheet" type="text/css">
  <title>FarMe</title>
</head>

<body>


  <h1>
    <?php 
      $nome = $_SESSION['nome'];
      $nome1 = implode($nome);
      $ola = "Olá, $nome1 ";
      echo "$ola"
    ?>
  </h1>

  <form action="../functions/cad_fazenda.php" method="post">
    <br><br><br>
    <input type="text" name="nome_fazenda" required="required" placeholder="Nome da sua fazenda">
    <input type="submit" value="Avançar">
  </form>
</body>

</html>