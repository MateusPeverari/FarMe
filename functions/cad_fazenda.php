<?php
  session_start();
  $nome = $_SESSION['nome'];
  $nome1 = implode($nome);

  if (isset($_POST["nome_fazenda"])) {
    
    $nome_fazenda = $_POST["nome_fazenda"];

    // conectando com o Banco de Dados (MySql)
		include("conexao.php");
		
		// montando comando requisição SQL
		// $sql = "INSERT INTO cadastro (Nome_Fazenda) VALUES '$nome_fazenda';";
    $sql = "UPDATE cadastro SET Nome_Fazenda='$nome_fazenda' WHERE Nome='$nome1'";  
  
    // envia requisição ao Banco de Dados (MySql)
		$resultado = mysqli_query($conexao,$sql) or die (mysqli_error($conexao));
    // Encerra conexão com o banco
    mysqli_close($conexao);
  }
?>