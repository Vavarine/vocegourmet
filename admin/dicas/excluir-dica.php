<?php

	include "../../conexao.php";
	$link = conectar();
   
   $id = $_GET['id'];
	
   $sql = "delete from dicas WHERE dicaId=$id";
   
   if ($link->query($sql) === TRUE) {
		fecharConexao($link);
	 } else {
	 	echo "Erro: " . $sql . "<br>" . $link->error;
   }
   
   header('location:../dicas');

	fecharConexao($link);

?>