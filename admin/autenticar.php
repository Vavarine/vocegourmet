<?php
   session_start();

   include "../conexao.php";
   $link = Conectar();

   if ( mysqli_connect_errno() ) {
      // If there is an error with the connection, stop the script and display the error.
      die ('Failed to connect to MySQL: ' . mysqli_connect_error());
   }

   // Now we check if the data from the login form was submitted, isset() will check if the data exists.
   if ( !isset($_POST['usuario'], $_POST['senha']) ) {
      // Could not get the data that should have been sent.
      die ('Please fill both the username and password field!');
   }

   // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
   if ($stmt = $link->prepare('SELECT id, senha FROM administradores WHERE usuario = ?')) {
      // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
      $stmt->bind_param('s', $_POST['usuario']);
      $stmt->execute();
      // Store the result so we can check if the account exists in the database.
      $stmt->store_result();
   }

   if ($stmt->num_rows > 0) {
      $stmt->bind_result($id, $senha);
      $stmt->fetch();
      // Account exists, now we verify the password.
      // Note: remember to use password_hash in your registration file to store the hashed passwords.
      if (password_verify($_POST['senha'], $senha)) {
         // Verification success! User has loggedin!
         // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
         session_regenerate_id();
         $_SESSION['loggedin'] = TRUE;
         $_SESSION['nome'] = $_POST['usuario'];
         $_SESSION['id'] = $id;
         header('Location:home.php');
      } else {
         echo 'Incorrect password!';
      }
   } else {
      echo 'Incorrect username!';
   }

   fecharConexao($link);
?>