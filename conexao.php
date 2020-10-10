<?php
	function conectar(){
		$link = mysqli_connect('sql200.epizy.com','epiz_24712723','fnwUpIdOD7oAta','epiz_24712723_db_gourmet')or die(mysqli_connect_error());
		mysqli_set_charset($link, "utf8")or die(mysqli_error($link));
		return $link;
	}

	function fecharConexao($link){
		mysqli_close($link)or die(mysqli_error($link));
	}
	
 ?>