<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php 
    session_start(); 
    include '../functions/conexao.php';
    $email = $_SESSION['email'];
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ciclo</title>
</head>

<body>
  <?php

  $sql = "SELECT * FROM cadastro WHERE Email = '$email'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $informacoes = $stmt->fetchAll();

  ?>

  <h1>Cadastro de Ciclo</h1>

  <form action="cad-ciclo.php">

    <label for="nome-fazenda">Fazenda</label>
    <select name="nome-fazenda" required="required">
      <option value="placeholder" disabled selected></option>
      <?php foreach($informacoes as $informacoes): ?>
      <option value="<?= $informacoes['Id']; ?>"><?= $informacoes['Nome_Fazenda']; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="safra">Safra</label>
    <input type="text" name="safra" required>

    <label for="cultura">Cultura</label>
    <input type="text" name="cultura" required>

    <label for="nome-ciclo">Nome do Ciclo</label>
    <input type="text" name="nome-ciclo" required>

    <label for="inicio">Início</label>
    <input type="date" name="inicio">

    <label for="final">Fim</label>
    <input type="date" name="final">

    <label for="receita-esperada">Receita esperada</label>
    <input type="text" name="receita-esperada">

  </form>
</body>

</html>