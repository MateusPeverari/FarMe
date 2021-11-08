<?php
  session_start();
  include("conexao.php");
  $ID = $_SESSION["ID"];
  $id = implode($ID[0]);
  $recebidosChecker = mysqli_query($conexao, "SELECT * FROM recebidos WHERE Id_Cad = '$id'");
  $despesasChecker = mysqli_query($conexao, "SELECT * FROM despesas WHERE Id_Cad = '$id'");
  $recebidos = 0;

  // Calculo lucro total da operação
  $stmt = $pdo->prepare("SELECT Saldo_Inicial FROM conta_banco WHERE Id_Cad = '$id'");
  $stmt->execute();
  $SALDO_INICIAL = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $saldo_inicial = implode($SALDO_INICIAL[0]);
  
  $stmt = $pdo->prepare("SELECT Valor FROM recebidos WHERE Id_Cad = '$id'");
  $stmt->execute();
  $RECEBIDOS = $stmt->fetchAll(PDO::FETCH_ASSOC);

  for ($i=0; $i < mysqli_num_rows($recebidosChecker); $i++) { 
    $aux = implode($RECEBIDOS[$i]);
    global $recebidos;
    $recebidos = $recebidos + $aux;
  }

  
  $stmt = $pdo->prepare("SELECT Valor FROM despesas WHERE Id_Cad = '$id'");
  $stmt->execute();
  $DESPESAS = $stmt->fetchAll(PDO::FETCH_ASSOC);

  for ($i=0; $i < mysqli_num_rows($despesasChecker); $i++) { 
    $aux = implode($DESPESAS[$i]);
    global $despesas;
    $despesas = $despesas + $aux;
  }

  $lucroTotal = $saldo_inicial + $recebidos - $despesas;
  // Fim lucro total

  // Mostrar saldo
  $stmt = $pdo->prepare("SELECT Saldo FROM conta_banco WHERE Id_Cad = '$id'");
  $stmt->execute();
  $SALDO = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $saldo = implode($SALDO[0]);
  // Fim saldo
?>