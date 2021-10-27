<?php

  include("conexao.php");
  session_start();
  $ID = $_SESSION["ID"];
  $id = implode($ID[0]);

  if (isset($_POST["safra"])) {
    $safra = $_POST["safra"];

    $sql = "INSERT INTO safra (Safra, Id_Cad) VALUES ('$safra', '$id');";

    $request = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

    mysqli_close($conexao);
  }

?>