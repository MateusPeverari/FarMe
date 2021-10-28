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
  <title>Conta Bancária</title>
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

  <h1>Cadastro Conta Bancária</h1>

  <form action="../functions/cad_conta.php" method="post">

    <label for="nome_conta">Nome da conta</label>
    <input type="text" name="nome_conta" required>

    <label for="tp_conta">Tipo de conta</label>
    <input type="text" name="tp_conta" required>

    <label for="banco">Banco</label>
    <input type="text" name="banco" required>

    <label for="titular">Titular</label>
    <select name="titular" required>
      <?php foreach($informacoes as $informacoes): ?>
      <option value="<?= $informacoes['Nome']; ?>"><?= $informacoes['Nome']; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="data_inicial">Data inicial</label>
    <input type="date" name="data_inicial" required>

    <label for="agencia">Agência</label>
    <input type="text" name="agencia" required>

    <label for="num_conta">Numero da conta</label>
    <input type="text" name="num_conta" required>

    <label for="saldo">Saldo</label>
    <input type="text" name="saldo" required>

    <button>Cadastrar</button>

  </form>

  <form action="int-home.php">
    <button>Cancelar</button>
  </form>

</body>

</html>