<?php 
  if(isset($_POST['nome-ciclo'])) {

    $nome_fazenda = $_POST["nome-fazenda"];
    $safra = $_POST["safra"];
    $cultura = $_POST["cultura"];
    $nome_ciclo = $_POST["nome-ciclo"];
    $data_inicial = $_POST["inicio"];
    $data_final = $_POST["final"];
    $receita_esperada = $_POST["receita-esperada"];

    include("conexao.php");

    $sql = "INSERT INTO ciclo "

  }
?>