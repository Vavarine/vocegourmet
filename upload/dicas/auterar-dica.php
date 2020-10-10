<?php

	include "../../conexao.php";
	$link = conectar();
   
   $id = $_GET['id'];

	$titulo		   = $_POST['titulo'];
   $descricao  	= $_POST['descricao'];
   $ingredientes  = $_POST['texto'];
	
   $sql = "UPDATE dicas SET titulo='$titulo', descricao='$descricao', texto='$texto' WHERE dicaId=$id";
   
   if ($link->query($sql) === TRUE) {
		fecharConexao($link);
	 } else {
	 	echo "Erro: " . $sql . "<br>" . $link->error;
   }
   
   header('location:../dicas');

	fecharConexao($link);

?>