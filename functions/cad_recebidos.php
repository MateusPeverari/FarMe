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

    
    // Selecionar Id da safra para atualizar recebidos da respectiva safra
    $stmt = $pdo->prepare("SELECT Id_Safra FROM ciclo WHERE Id = '$ciclo'");
    $stmt->execute();
    $SAFRA = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $safra = implode($SAFRA[0]);
    
    // Selecionar recebidos da safra
    $stmt = $pdo->prepare("SELECT Recebidos FROM safra WHERE Id = '$safra'");
    $stmt->execute();
    $RECEBIDOS_SAFRA = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $recebidos_safra = implode($RECEBIDOS_SAFRA[0]);
    $recebidos_safra = $recebidos_safra + $valor;

    // Selecionar recebidos do ciclo
    $stmt = $pdo->prepare("SELECT Recebidos FROM ciclo WHERE Id = '$ciclo'");
    $stmt->execute();
    $RECEBIDOS_CICLO = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $recebidos_ciclo = implode($RECEBIDOS_CICLO[0]);
    $recebidos_ciclo = $recebidos_ciclo + $valor;
    
    $sql = "INSERT INTO recebidos (Nome_Fazenda, Operacao, Id_Ciclo, Valor, Data_Pag, Pessoa, Obs, Id_Cad, Id_Conta, Id_Safra) VALUES ('$nome_fazenda', '$operacao', '$ciclo', '$valor', '$data', '$pessoa', '$observacao', '$id', '$conta', '$safra');";

    $request = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    
    $stmt = $pdo->prepare("SELECT saldo FROM conta_banco WHERE Id = '$conta'");
    $stmt->execute();
    $SALDO = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $saldo = implode($SALDO[0]);
    
    $saldo = $saldo + $valor;
    
    $sql = "UPDATE conta_banco SET Saldo = '$saldo' WHERE Id = '$conta'";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    
    // Update na tabela safra
    $sql = "UPDATE safra SET Recebidos = '$recebidos_safra' WHERE Id = '$safra'";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

     // Update na tabela ciclo
     $sql = "UPDATE ciclo SET Recebidos = '$recebidos_ciclo' WHERE Id = '$ciclo'";
     mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    
    mysqli_close($conexao);

    echo "<script language='javascript' type='text/javascript'>
    alert('Cadastro feito com sucesso');window.location
    .href='../pages/int-home.php';</script>";;
  }

?>