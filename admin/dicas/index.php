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
		<meta charset="utf-8">
      <title>Dicas - Admin</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	   <script type="text/javascript" src="../../js/script.js"></script>
      <link href="../../css/style-admin.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin preload">
		<nav class="navtop">
			<div>
            <h1>Você Gourmet!</h1>
            <a href="../home.php"><i></i>Home</a>
            <a href="../dicas"><i></i>Dicas</a>
            <a href="../receitas"><i></i>Receitas</a>
            <a href="../sair.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
			</div>
		</nav>
		<div class="content">
			<h2>Administrar Dicas</h2>
         <p>Adminsistrador logado: <?=$_SESSION['nome']?></p>

         <center>
            <div class="container">
               <a class="btn" href="add-dica.php"><div class="btn-grande">ADICIONAR DICA</div></a>


               <br><br>
               <h1 class="titulo">Dicas já adicionadas</h1>
               <hr>

               <?php
                  include "../../conexao.php";
            
                  $link = Conectar();

                  $sql = mysqli_query($link, "select * from dicas order by dicaId desc");

                  while($row = mysqli_fetch_assoc($sql)){
                     $id = $row['dicaId'];
                     $titulo = $row['titulo'];
                     $descricao = $row['descricao'];
                     $imagem = $row['imagem'];
               ?>

                  <div class="receita">

                     <div class="imagem-receita">
                        <img class="imagem-receita" src=../../upload/<?php echo$imagem?>>
                     </div>
                     
                     <div class="texto-receita">
                        <h1><?php echo $titulo ?></h1>
                        <p><?php echo $descricao ?><p>
                     </div>

                     <div class="botoes">
                        <a href="excluir-dica.php?id=<?php echo$id ?>"><div class="excluir"><i class="far fa-trash-alt"></i></div></a>
                        <a href="editar-dica.php?id=<?php echo$id ?>"><div class="editar"><i class="far fa-edit"></i></div></a>
                     </div>

                  </div>

               <?php
                  } 

                  fecharConexao($link);
               ?>

            </div>

         </center>

      </div>
      
	</body>
</html>