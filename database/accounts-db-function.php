<?php 

    include "sql-connect.php";

       function register($db, $username, $email, $cpf, $idade, $objetivo, $tempo, $password) {
        $result = $db->query("SELECT * FROM users");
        $count = 0;
        foreach ($result as $row) { 
            if ($row['username'] === $username) {  
                $count = 1;
            }
        }
    
        if ($count === 1) {
            header("Location: registration.php?error=account is taken");
        } else {
            $stmt = $db->prepare(
                "INSERT INTO users (username, email, cpf, idade, objetivo, tempo, password) 
                VALUES (:username, :email, :cpf, :idade, :objetivo, :tempo, :password)"
            );
            
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
            $stmt->bindParam(':idade', $idade, PDO::PARAM_STR);
            $stmt->bindParam(':objetivo', $objetivo, PDO::PARAM_STR);
            $stmt->bindParam(':tempo', $tempo, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR);
            
            $stmt->execute();
            header ("Location: login.php?msg=conta criada com sucesso");
            }
        }

        function login($db, $username, $password) {
          $result = $db->query("SELECT * FROM users");
          
          foreach ($result as $row) { 
              if ($row['username'] === $username && $row['password'] === $password) {  
                      header("Location: tela-do-jogo.php?msg=login realizado com sucesso");
                  } else {
                      header("Location: login.php?home");
                  }              
            }
        }
?>
