<?php
  include("conexao.php");

  session_start();
  $ID = $_SESSION["ID"];
  $id = implode($ID[0]);
  
  if (isset($_POST["operacao"])) {
    
    $operacao = $_POST["operacao"];
    $nome_fazenda = $_POST["nome_fazenda"];
    $valor = $_POST["valor"];
    $ciclo = $_POST["ciclo"];
    $data = $_POST["data_lancamento"];
    $pessoa = $_POST["pessoa"];
    $observacao = $_POST["observacao"];
    $conta = $_POST["conta"];

      // Selecionar Id da safra para atualizar despesas da respectiva safra
      $stmt = $pdo->prepare("SELECT Id_Safra FROM ciclo WHERE Id = '$ciclo'");
      $stmt->execute();
      $SAFRA = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $safra = implode($SAFRA[0]);
      
      // Selecionar despesas da safra
      $stmt = $pdo->prepare("SELECT Despesas FROM safra WHERE Id = '$safra'");
      $stmt->execute();
      $DESPESAS_SAFRA = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $despesas_safra = implode($DESPESAS_SAFRA[0]);
      $despesas_safra = $despesas_safra + $valor;

      // Selecionar despesas do ciclo
      $stmt = $pdo->prepare("SELECT Despesas FROM ciclo WHERE Id = '$ciclo'");
      $stmt->execute();
      $DESPESAS_CICLO = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $despesas_ciclo = implode($DESPESAS_CICLO[0]);
      $despesas_ciclo = $despesas_ciclo + $valor;

    $sql = "INSERT INTO despesas (Nome_Fazenda, Operacao, Valor, Id_Ciclo, Data_Pag, Obs,Pessoa, Id_Cad, Id_Conta, Id_Safra) VALUES ('$nome_fazenda', '$operacao', '$valor', '$ciclo', '$data', '$pessoa', '$observacao', '$id', '$conta', '$safra');";

    $request = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    
    
    
    $stmt = $pdo->prepare("SELECT saldo FROM conta_banco WHERE Id = '$conta'");
    $stmt->execute();
    $SALDO = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $saldo = implode($SALDO[0]);
    
    $saldo = $saldo - $valor;

    if ($saldo < 0) {
      echo "<script language='javascript' type='text/javascript'>
      alert('Saldo insuficiente!');window.location
      .href='../pages/cadastro-despesas_page.php';</script>";;
      die();
    }
    
    $sql = "UPDATE conta_banco SET Saldo = '$saldo' WHERE Id = '$conta'";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

    $sql = "UPDATE safra SET Despesas = '$despesas_safra' WHERE Id = '$safra'";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

    $sql = "UPDATE ciclo SET Despesas = '$despesas_ciclo' WHERE Id = '$ciclo'";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    
    
    mysqli_close($conexao);
    echo "<script language='javascript' type='text/javascript'>
    alert('Cadastro feito com sucesso');window.location
    .href='../pages/int-home.php';</script>";;
  }

?>