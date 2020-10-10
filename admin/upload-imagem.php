<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
   header('Location: index.html');
   exit();
}
?>

<!DOCTYPE html>
<html>

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Adicionar Imagem - Admin</title>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/script.js"></script>
   <link href="../css/style-admin.css" rel="stylesheet" type="text/css">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>

<body class="loggedin preload">
   <nav class="navtop">
      <div>
         <h1>Você Gourmet!</h1>
         <a href="home.php"><i></i>Home</a>
         <a href="/dicas"><i></i>Dicas</a>
         <a href="/receitas"><i></i>Receitas</a>
         <a href="sair.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
      </div>
   </nav>
   <div class="content">
      <h2>Adicionar Imagem</h2>
      <p>Adminsistrador logado: <?= $_SESSION['nome'] ?></p>

      <center>
         <div class="container">

            <form class="adicionar" method="POST" enctype="multipart/form-data" action="enviar-imagem.php">
               <input type="text" name="titulo" placeholder="Título da imagem (se já ouver uma imagem com esse titulo ela será substituida)" required>
               <input type="file" class="file" name="pic" accept="image/*"><br><br>
               <button type="submit" class="btn-grande" type="submit">Enviar</button>
            </form>

         </div>
      </center>

   </div>

</body>

</html>