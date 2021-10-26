<html>

<head>
  <?php 
    include '../functions/conexao.php';
    ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../style/functions.css" rel="stylesheet" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,700;1,300;1,400&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="../style/cadastro_page.css" rel="stylesheet" type="text/css">
  <title>FarMe</title>
</head>

<?php
  $sql = "SELECT * FROM atividade";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $activities = $stmt->fetchAll();

  $sql = "SELECT * FROM tamanho";
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  $size = $stmt->fetchAll();
?>

<div id="cad_page">
  <img src="../assets/images/Illustration.svg" id="cad_img" />


  <h2> Gerencie sua fazenda <br>
    de forma rápida <br>
    e eficiente! </h2>

</div>

<img src="../assets/images/logo.png" id="logo_img" />

<form method="post" action="../functions/cadastro.php">
  <br><br><br>

  <h1>Cadastro</h1>

  <p>
    <input id="nome_cad" name="nome_cad" required="required" type="text" placeholder="Nome" />
  </p>

  <p>
    <input id="email_cad" name="email_cad" required="required" type="email" placeholder="Email" />
  </p>


  <p>
    <input id="telefone_cad" name="telefone_cad" required="required" type="text" placeholder="Telefone" />
  </p>


  <p>
    <select id="atv_cad" name="atv_cad" required="required">
      <option value="placeholder" disabled selected>Principal atividade</option>
      <?php foreach($activities as $activity): ?>
      <option value="<?= $activity['Cdg_Atividade']; ?>"><?= $activity['Atividade']; ?></option>
      <?php endforeach; ?>
    </select>
  </p>

  <p>
    <select id="atv_cad2" name="tamanho_cad" required="required">
      <option value="placeholder" disabled selected>Qual o tamanho da sua propriedade?</option>
      <?php foreach($size as $size): ?>
      <option value="<?= $size['Cdg_Tamanho']; ?>"><?= $size['Tamanho']; ?></option>
      <?php endforeach; ?>
    </select>
  </p>

  <p>
    <select id="atv_cad3" name="uso_cad" required="required">
      <option value="placeholder">Já usou algum software de gestão agrícola?</option>
      <option value="1">Sim</option>
      <option value="0">Não</option>
    </select>
  </p>

  <p>
    <input id="senha_cad1" name="senha_cad" required="required" type="password" placeholder="Senha" />
  </p>

  <p>
    <input id="senha_cad2" name="senha_cad2" required="required" type="password" placeholder="Confirma senha" />
  </p>

  <p>
    <input type="submit" value="Cadastrar" id="cad" />
  </p>

  <p class="link" id="link_cad">
    Já possui uma conta?
    <a href="../pages/login_page.php"> Ir para Login </a>
  </p>
</form>

</html>