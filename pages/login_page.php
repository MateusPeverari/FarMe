<?php 
  include '../functions/functions.php'
?>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="../style/functions.css" rel="stylesheet" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,700;1,300;1,400&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link href="../style/login_page.css" rel="stylesheet" type="text/css">
  <title>FarMe</title>
</head>


<div id="log_pag">
  <img src="../assets/images/Illustration.svg" id="log_img" />


  <h2> Gerencie sua fazenda <br>
    de forma rápida <br>
    e eficiente! </h2>

</div>
<img src="../assets/images/logo.png" id="img" />

<form method="post" action="../functions/login.php">
  <br><br><br>
  <h1>Login</h1>
  <p id="email_log">
    <input id="email_login" name="email_login" required="required" type="text" placeholder="Seu email" />
  </p>

  <p id="senha_log">
    <input id="senha_login" name="senha_login" required="required" type="password" placeholder="Digite sua senha" />
  </p>

  <p>
    <input type="submit" value="Logar" id="log" />
  </p>

  <p class="link" id="new_cad">
    Ainda não tem conta?
    <a href="../pages/cadastro_page.php">Cadastre-se</a>
  </p>
</form>