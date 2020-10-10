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
	<title>Home - Admin</title>
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
			<a href="dicas/"><i></i>Dicas</a>
			<a href="receitas/"><i></i>Receitas</a>
			<a href="sair.php"><i class="fas fa-sign-out-alt"></i>Sair</a>
		</div>
	</nav>
	<div class="content">
		<h2>Home Page</h2>
		<p>Administrador logado: <?= $_SESSION['nome'] ?></p>

		<div class="container">

			<form class="pesquisar" method="POST" enctype="multipart/form-data" action="#">
				<div class="container">
					<div class="texto"><input type="text" name="pesquisar" placeholder="Pesquise por receitas e dicas" required></div>
					<div class="botao"><button type="submit" name="enviar">pesquisar</button></div>
				</div>
			</form>

			<?php

			include "../conexao.php";

			$link = Conectar();

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if (isset($_POST['enviar'])) {

					?>
					<h1 class="titulo">Receitas encontradas</h1>
					<hr>
					<?php

						$pesquisar = $_POST['pesquisar'];

						$sql = mysqli_query($link, "SELECT * FROM receitas WHERE titulo LIKE '%$pesquisar%' LIMIT 5");

						while ($row = mysqli_fetch_assoc($sql)) {
							$id = $row['receitaId'];
							$titulo = $row['titulo'];
							$descricao = $row['descricao'];
							$imagem = $row['imagem'];
					?>

						<div class="receita">

							<div class="imagem-receita">
								<img class="imagem-receita" src=../upload/<?php echo $imagem ?>> </div> <div class="texto-receita">
								<h1><?php echo $titulo ?></h1>
								<p><?php echo $descricao ?><p>
							</div>

							<div class="botoes">
								<a href="receitas/excluir-receita.php?id=<?php echo $id ?>">
									<div class="excluir"><i class="far fa-trash-alt"></i></div>
								</a>
								<a href="receitas/editar-receita.php?id=<?php echo $id ?>">
									<div class="editar"><i class="far fa-edit"></i></div>
								</a>
							</div>

						</div>

					<?php
						}
					?>
					<br><br>
					<h1 class="titulo">Dicas encontradas</h1>
					<hr>
					<?php

						$sql = mysqli_query($link, "SELECT * FROM dicas WHERE titulo LIKE '%$pesquisar%' LIMIT 5");

						while ($row = mysqli_fetch_assoc($sql)) {
							$id = $row['dicaId'];
							$titulo = $row['titulo'];
							$descricao = $row['descricao'];
							$imagem = $row['imagem'];
					?>

						<div class="receita">

							<div class="imagem-receita">
								<img class="imagem-receita" src=../upload/<?php echo $imagem ?>> </div> <div class="texto-receita">
								<h1><?php echo $titulo ?></h1>
								<p><?php echo $descricao ?><p>
							</div>

							<div class="botoes">
								<a href="dicas/excluir-dica.php?id=<?php echo $id ?>">
									<div class="excluir"><i class="far fa-trash-alt"></i></div>
								</a>
								<a href="dicas/editar-dica.php?id=<?php echo $id ?>">
									<div class="editar"><i class="far fa-edit"></i></div>
								</a>
							</div>

						</div>

					<?php
						}
					}
				}

				fecharConexao($link);
			?>

		</div>

		<div  class="container">
			<h1 class="titulo">Fazer upload de imagens para o servidor</h1>
			<hr>
			<a class="btn" href="upload-imagem.php"><div class="btn-grande">FAZER UPLOAD DE IMAGEM</div></a>
		</div>

	</div>
</body>

</html>