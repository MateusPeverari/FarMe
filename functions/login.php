<?php
  // Login
  $email_login = $_POST["email_login"];
  $senha_login = $_POST["senha_login"];

    include("conexao.php"); 
    
    if (isset($_POST["email_login"])) {
        $verifica = mysqli_query($conexao, "SELECT * FROM cadastro WHERE Email = '$email_login' AND Senha = '$senha_login'") or die("erro ao selecionar");
  
        if (mysqli_num_rows($verifica)<=0){
            echo"<script language='javascript' type='text/javascript'>
            alert('Login e/ou senha incorretos');window.location
            .href='../pages/login_page.php';</script>";
            die();
          }


            $stmt = $pdo->prepare("SELECT * FROM cadastro WHERE Email = '$email_login' AND Senha = '$senha_login'");
            $stmt->execute();
            $sql = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // $result = mysqli_query($conexao,$sql);
            
            $NOME = $pdo->prepare("SELECT Nome FROM cadastro WHERE Email = '$email_login' AND Senha = '$senha_login'");
            $NOME->execute();
            $nome = $NOME->fetch(PDO::FETCH_ASSOC);
                
            session_start(); 
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email_login;

            setcookie("email",$email_login);

            $fazenda = mysqli_query($conexao,"SELECT * FROM cadastro WHERE Email = '$email_login' AND Senha = '$senha_login' AND Nome_Fazenda IS NULL") or die("erro ao selecionar");

            if (mysqli_num_rows($fazenda) > 0) {
              header("Location:../pages/int-cad_fazenda.php");
            }else {
              // TESTES, CORRIGIR REDIRECIONAMENTO
              header("Location:../pages/cadastro-ciclo_page.php");
            }
      mysqli_close($conexao);
    }
?>