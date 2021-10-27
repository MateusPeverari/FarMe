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
  <title>Recebidos</title>
</head>

<body>

  <?php
  $sql = "SELECT * FROM cadastro WHERE Email = '$email'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $informacoes = $stmt->fetchAll();

  $sql = "SELECT * FROM ciclo WHERE Id_Cad = '$id'";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $id_ciclo = $stmt->fetchAll();

  ?>

  <form action="cad_recebidos.php" method="post">

    <label for="operacao">Operação</label>
    <input type="text" name="operacao" required>

    <label for="nome_fazenda">Fazenda</label>
    <select name="nome_fazenda" required="required">
      <?php foreach($informacoes as $informacoes): ?>
      <option value="<?= $informacoes['Nome_Fazenda']; ?>"><?= $informacoes['Nome_Fazenda']; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="valor">Valor</label>
    <input type="text" name="valor" required>

    <label for="ciclo">Ciclo</label>
    <select name="ciclo" required>
      <?php foreach($id_ciclo as $id_ciclo): ?>
      <option value="<?= $id_ciclo['Nome_Ciclo']; ?>"><?= $id_ciclo['Nome_Ciclo']; ?></option>
      <?php endforeach; ?>
    </select>

    <label for="data_lancamento">Data</label>
    <input type="date" name="data_lancamento" required>

    <label for="pessoa">Pessoa Responsável</label>
    <input type="text" name="pessoa" required>

    <label for="observacao">Observações</label>
    <input type="text" name="observacao">

    <button>Enviar</button>

  </form>

  <form action="int-home.php">
    <button>Cancelar</button>
  </form>



</body>

</html>