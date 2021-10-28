<?php 

  include("conexao.php");

  session_start();
  $email = $_SESSION["email"];
  $ID = $_SESSION["ID"];
  $id = implode($ID[0]);

  if (isset($_POST["nome_conta"])) {
    $nome_conta = $_POST["nome_conta"];
    $tp_conta = $_POST["tp_conta"];
    $banco = $_POST["banco"];
    $titular = $_POST["titular"];
    $data_inicial = $_POST["data_inicial"];
    $agencia = $_POST["agencia"];
    $num_conta = $_POST["num_conta"];
    $saldo = $_POST["saldo"];

    $sql = "INSERT INTO conta_banco (TpConta, Banco, Titular, Data_Inicial, Agencia, Num_Conta, Saldo, Id_Cad, Nome_Conta) VALUES ('$tp_conta', '$banco', '$titular', '$data_inicial', '$agencia', '$num_conta', '$saldo', '$id', '$nome_conta');";

    $request = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

    mysqli_close($conexao);

    echo "<script language='javascript' type='text/javascript'>
    alert('Cadastro feito com sucesso');window.location
    .href='../pages/int-home.php';</script>";;
  }

?>