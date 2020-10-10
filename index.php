<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" sizes="96x96" href="imagens\favicon-96x96.png">

	<title>Você Gourmet!</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<script type="text/javascript" src="js/script.js"></script>

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body id="inicial" class="preload">

	<div id="information-box">
		<p class="information-box">Caixas Gourmet</p>
		<a href="caixas.html" target="_parent">
			<div id="linkcaixa">
				Clique e veja nossas Caixas Gourmet e se torne um chef agora mesmo!
			</div>
		</a>
		<a href="index.html" target="_parent"><img class="logo" src="imagens/logo-branco.png">
	</div>

	<div class="cabecalho">

		<nav id="menu">
			<ul>
				<a href="caixas.html">
					<li>Caixas Gourmet</li>
				</a>
				<a href="receitas.php">
					<li>Receitas</li>
				</a>
				<a href="dicas.php">
					<li>Dicas</li>
				</a>
				<a href="quemsomos.html">
					<li>Quem somos</li>
				</a>
				<li>
					<form class="pesquisar" method="POST" action="pesquisa.php">
						<input type="text" name="pesquisar" placeholder="Pesquise por receitas e dicas" required>
						<button type="submit" name="enviar"><i class="fas fa-search"></i></button>
					</form>
				</li>
			</ul>
		</nav>
		<a href="index.php"><img class="logoprincipal" src="imagens\logo-branco.png"></a>
	</div>

	

	<div class="container">

		<div id="descricaosite">
			O Você Gourmet! almeja que você em sua casa possa se sentir um cozinheiro gourmet ao menos uma vez por mês, com a nossa Caixa Gourmet,
			que te inspira – também com receitas e dicas exclusivas no site – a sair da zona de conforto da culinária e buscar novos horizontes!
		</div>

		<center>

			<br><br><br><br>

			<div class="descricao-principal">
				<div class="texto-descricao">
					<h1>Nossas Caixas Gourmet!</h1><br>
					<p>A Você Gourmet! é um serviço que ira fazer com que você se sinta um verdadeiro chef!</p>
					<p>A Você Gourmet! é  uma empresa que presta serviços dedicados ao bem estar das pessoas, buscando levar praticidade, lazer, e uma experiencia gastronômica única.</p>
					<p>Ao assinar o serviço serão entregues caixas (inspiradas no sistema de Loot Box) com ingredientes selecionados e com as medidas exatas para a realização de  uma receita gourmet!</p>
				</div>
				<div class="imagem-descricao">
					<img class="imagem-descricao" src="imagens\homem-cozinhando.jpg">
				</div>
			</div>

			<br><br><br><br>

			<a href="caixas.html"><div class="btn-grande">Clique e saiba mais!</div></a>

			<br><br><br><br><br><br><br><br><br><br><br>

			<h1>Receitas recem adicionadas</h1>
			<hr>

			<div class="conteudo">

				<br><br><br><br><br>


				<?php

					include "conexao.php";

					$link = Conectar();

					$sql = mysqli_query($link, "select * from receitas order by receitaId desc limit 6");

					while($row = mysqli_fetch_assoc($sql)){
					$id = $row['receitaId'];
					$titulo = $row['titulo'];
					$descricao = $row['descricao'];
					$imagem = $row['imagem'];

				?>

					<div id="receita">
						<a href="receita.php?id=<?php echo$id ?>" target="_parent">
							<figure class="foto-legenda">
								<img class="imgdescricao" src="upload/<?php echo$imagem ?>" height="300px" width="300px">
								<figcaption>
									<h3><?php echo$titulo ?></h3>
									<p><?php echo$descricao ?></p>
								</figcaption>
							</figure>
						</a>
					</div>		

				<?php

					}

				?>

			</div>

			<br><br><br><br><br><br><br><br>

			<h1>Dicas recem adicionadas</h1>
			<hr>

			<div class="conteudo">

				<br><br><br><br><br>


				<?php

					$link = Conectar();

					$sql = mysqli_query($link, "select * from dicas order by dicaId desc limit 6");

					while($row = mysqli_fetch_assoc($sql)){
					$id = $row['dicaId'];
					$titulo = $row['titulo'];
					$descricao = $row['descricao'];
					$imagem = $row['imagem'];

				?>

					<div id="receita">
						<a href="dica.php?id=<?php echo$id ?>" target="_parent">
							<figure class="foto-legenda">
								<img class="imgdescricao" src="upload/<?php echo$imagem ?>" height="300px" width="300px">
								<figcaption>
									<h3><?php echo$titulo ?></h3>
									<p><?php echo$descricao ?></p>
								</figcaption>
							</figure>
						</a>
					</div>		

				<?php

					}

				?>

			</div>

		</center>

	</div>

	<footer id="rodape">
		<table align="center">
			<tr>
				<th align="left"> São Paulo </th>
				<th class="invisible">___________________________________</th>
				<th align="left"> Links para contato </th>
			</tr>
			<tr>
				<td> Mauá </td>
				<td> </td>
				<td align="left">
					<a href="https://www.facebook.com" target="_blank"> <img src="imagens/facebook-icon.png" width="30"> </a>
					<a href="https://twitter.com/login?lang=pt" target="_blank"> <img src="imagens/twitter-icon.png" width="30"> </a>
					<a href="https://www.youtube.com/?gl=BR&hl=pt" target="_blank"> <img src="imagens/youtube-icon.png" width="30"> </a>
					<a href="https://www.instagram.com/?hl=pt-br" target="_blank"> <img src="imagens/instagram-icon.png" width="30"> </a>
				</td>
			</tr>
			<tr>
				<td> 🏠 R. Ribeirão Preto, 75 - Jardim Pedroso</td>
				<td> </td>
				<td> contato@vocegourmet.com
			</tr>
			<tr>
				<td> CEP-09370-530 </td>
			</tr>
			<td>📞 (11) 4513-4672 </td>
		</table>

		<br> Copyright © 2018 - by alunos da Etec de Mauá
	</footer>

</body>

</html>