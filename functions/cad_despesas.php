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

    $sql = "INSERT INTO despesas (Nome_Fazenda, Operacao, Valor, Id_Ciclo, Data_Pag, Obs,Pessoa, Id_Cad, Id_Conta) VALUES ('$nome_fazenda', '$operacao', '$valor', '$ciclo', '$data', '$pessoa', '$observacao', '$id', '$conta');";

    $request = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    
    
    
    $stmt = $pdo->prepare("SELECT saldo FROM conta_banco WHERE Id = '$conta'");
    $stmt->execute();
    $SALDO = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $saldo = implode($SALDO[0]);
    
    $saldo = $saldo - $valor;
    
    $sql = "UPDATE conta_banco SET Saldo = '$saldo' WHERE Id = '$conta'";
    mysqli_query($conexao, $sql) or die (mysqli_error($conexao));
    
    mysqli_close($conexao);
    echo "<script language='javascript' type='text/javascript'>
    alert('Cadastro feito com sucesso');window.location
    .href='../pages/int-home.php';</script>";;
  }

?>