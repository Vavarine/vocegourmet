<?php
	
	if(isset($_FILES['pic']))
	{
	 
      $ext_img = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando ext_img extenção do arquivo
		$nome_img = $_POST['titulo'] . $ext_img; //Definindo um novo nome para o arquivo
		$dir_img = '../upload/'; //dir_imgetório para uploads

		move_uploaded_file($_FILES['pic']['tmp_name'], $dir_img.$nome_img); //Fazer upload do arquivo

	} 

	header('location:upload-imagem.php');

?>