<?php 
  
  function template_header(){
    echo <<<EOT
    <!DOCTYPE html>
    <html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link href="../style/functions.css" rel="stylesheet" type="text/css">
            <title>FarMe</title>
        </head>
          <header>
            <img class="logo" src="../assets/images/logo.png" alt="logo" height="40px">
            <nav>
              <ul class="nav_links">
                <li><a href="#">FarMe</li>
                <li><a href="#">Sobre Nós</li>
                <li><a href="#">Contato</li>
                <li><a href="#">Login</li>
              </ul>
            </nav>              
          </header>
    </html>
    EOT;
  }


?>