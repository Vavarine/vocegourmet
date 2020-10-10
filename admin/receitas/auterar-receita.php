<?php

	include "../../conexao.php";
	$link = conectar();
   
   $id = $_GET['id'];

	$titulo		   = $_POST['titulo'];
   $descricao  	= $_POST['descricao'];
   $ingredientes  = $_POST['ingredientes'];
   $preparo       = $_POST['preparo'];
	
   $sql = "UPDATE receitas SET titulo='$titulo', descricao='$descricao', ingredientes='$ingredientes', preparo='$preparo' WHERE receitaId=$id";
   
   if ($link->query($sql) === TRUE) {
		fecharConexao($link);
	 } else {
	 	echo "Erro: " . $sql . "<br>" . $link->error;
   }
   
   header('location:../receitas');

	fecharConexao($link);

?>