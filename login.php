<?php 
  include "database/accounts-db-function.php"; 

  if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    login($db, $username, $password);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Educa-se</title>

    <link rel="stylesheet" href="assets/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/images/signin-image.png" alt="sing up image"></figure>
                        <a href="registration.php" class="signup-image-link">Crie a sua conta</a>
                        <a href="index.php" class="signup-image-link">ou retorne para o login</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Entre para jogar</h2>
                        <form method="post" action="login.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Usuário" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Senha" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
</body>
</html>