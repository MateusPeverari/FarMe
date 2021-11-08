<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar Safra</title>
</head>

<body>
  <form action="../functions/safra.php" method="post">
    <label for="safra">Ano(s) da Safra</label>
    <input type="text" name="safra" required>
    <button>Enviar</button>
  </form>

  <form action="safra_page.php">Cancelar</form>
</body>

</html>