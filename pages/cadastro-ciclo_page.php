<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php 
    session_start(); 
    include '../functions/conexao.php';
    $email = $_SESSION['email'];
    $ID = $_SESSION['id'];
    $id = implode($ID[0]);
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

  $sql = "SELECT * FROM safra WHERE Id_Cad = '$id'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $id_safra = $stmt->fetchAll();
  ?>

  <h1>Cadastro de Ciclo</h1>

  <form method="post" action="../functions/cad_ciclo.php">

    <label for="nome_fazenda">Fazenda</label>
    <select name="nome_fazenda" required="required">
      <?php foreach($informacoes as $informacoes): ?>
      <option value="<?= $informacoes['Nome_Fazenda']; ?>"><?= $informacoes['Nome_Fazenda']; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="safra">Safra</label>
    <select name="safra" required>
      <?php foreach($id_safra as $id_safra): ?>
      <option value="<?= $id_safra['Id']; ?>"><?= $id_safra['Safra']; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="cultura">Cultura</label>
    <input type="text" name="cultura" required>

    <label for="nome_ciclo">Nome do Ciclo</label>
    <input type="text" name="nome_ciclo" required>

    <label for="inicio">Início</label>
    <input type="date" name="inicio">

    <label for="final">Fim</label>
    <input type="date" name="final">

    <label for="receita_esperada">Receita esperada</label>
    <input type="text" name="receita_esperada">

    <button>Enviar</button>

  </form>

  <form action="ciclo_page.php">
    <button>Cancelar</button>
  </form>

</body>

</html>