<?php 

include("conexao.php");

session_start();
$email = $_SESSION["email"];
$ID = $_SESSION["ID"];
$id = implode($ID[0]);


if(isset($_POST['nome_fazenda'])) {
  
  
    $nome_fazenda = $_POST["nome_fazenda"];
    $safra = $_POST["safra"];
    $cultura = $_POST["cultura"];
    $nome_ciclo = $_POST["nome_ciclo"];
    $data_inicial = $_POST["inicio"];
    $data_final = $_POST["final"];
    $receita_esperada = $_POST["receita_esperada"];


    $sql = "INSERT INTO ciclo (Nome_Fazenda, Id_Safra, Cultura, Nome_Ciclo, Data_Inicial, Data_Final, Receita_Esperada, Id_Cad) VALUES ('$nome_fazenda', '$safra', '$cultura', '$nome_ciclo', '$data_inicial', '$data_final', '$receita_esperada', '$id');";
    
    $resultado = mysqli_query($conexao, $sql) or die (mysqli_error($conexao));

    mysqli_close($conexao);

    echo "<script language='javascript' type='text/javascript'>
    alert('Cadastro feito com sucesso');window.location
    .href='../pages/int-home.php';</script>";;
  }
?>