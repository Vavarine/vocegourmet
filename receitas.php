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
			<p>O Você Gourmet! disponibiliza nesta área receitas exclusivas e de alto escalão para você testar em sua casa!</p>
		</div>



		<center>

		<?php
                  include "conexao.php";
            
                  $link = Conectar();

                  $sql = mysqli_query($link, "select * from receitas order by receitaId desc");

                  while($row = mysqli_fetch_assoc($sql)){
                     $id = $row['receitaId'];
                     $titulo = $row['titulo'];
                     $descricao = $row['descricao'];
                     $imagem = $row['imagem'];
               ?>

                  <div class="receita">

                     <div class="imagem-receita">
                        <img class="imagem-receita" src=upload/<?php echo$imagem?>>
                     </div>
                     
							<a href="receita.php?id=<?php echo$id ?>">
								<div class="texto-receita">
									<h1><?php echo $titulo ?></h1>
									<br>
									<p><?php echo $descricao ?><p>
								</div>
							</a>

                  </div>

               <?php
                  } 

                  fecharConexao($link);
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