<?php
    include "database/sql-connect.php";
    include "database/accounts-db-function.php";

    if(isset($_POST['username'])){
      $username = $_POST["username"];           
      $cpf = $_POST["cpf"];
      $email = $_POST["email"];
      $idade = $_POST["idade"];
      $objetivo = $_POST["objetivo"];
      $tempo = $_POST["tempo"];
      $password = md5($_POST["password"]);
            
      register($db, $username, $email, $cpf, $idade, $objetivo, $tempo, $password);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crie sua conta para jogar</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Criar conta</h2>
                        <form method="post" action="registration.php" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Nome de usuário" required/>
                            </div>
                            <div class="form-group">
                                <label for="cpf"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" maxlength=11 name="cpf" id="cpf" placeholder="CPF" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Seu E-mail" required/>
                            </div>
                            <div class="form-group">
                                <label for="idade"><i class="zmdi zmdi-email"></i></label>
                                <input type="number" name="idade" id="idade" placeholder="Idade" required/>
                            </div>
                            <div class="form-group">
                                <label for="objetivo"><i class="zmdi zmdi-email"></i></label>
                                <input type="number" name="objetivo" id="objetivo" placeholder="Valor do Objetivo" required/>
                            </div>
                            <div class="form-group">
                                <label for="tempo"><i class="zmdi zmdi-email"></i></label>
                                <input type="number" name="tempo" id="tempo" placeholder="Em quanto tempo?" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Senha" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/images/signup-image.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Já possuo uma conta</a>
                    </div>
                </div>
            </div>
        </section>      
</body>
</html>