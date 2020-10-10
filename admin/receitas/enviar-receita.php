<?php

	include "../../conexao.php";
	$link = conectar();
	
	if(isset($_FILES['pic']))
	{
	 
      $ext_img = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando ext_img extenção do arquivo
		$nome_img = uniqid() . $ext_img; //Definindo um novo nome para o arquivo
		$dir_img = '../../upload/'; //dir_imgetório para uploads

		move_uploaded_file($_FILES['pic']['tmp_name'], $dir_img.$nome_img); //Fazer upload do arquivo

	} 
	
	$titulo		   = $_POST['titulo'];
   $descricao  	= $_POST['descricao'];
   $ingredientes  = $_POST['ingredientes'];
	$preparo       = $_POST['preparo'];
	$datahora		= date('Y-m-d H:i:s');
	
	$sql = "INSERT INTO receitas VALUES";
	$sql .= "(null, '$titulo', '$descricao', '$ingredientes', '$preparo', '$nome_img', '$datahora')";
	
	if ($link->query($sql) === TRUE) {
		fecharConexao($link);
	 } else {
	 	echo "Erro: " . $sql . "<br>" . $link->error;
	}

	header('location:../receitas');

	fecharConexao($link);

?>