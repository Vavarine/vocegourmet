<?php
function conectar()
{
	$host = 'localhost';
	$user = 'root';
	$password = '';
	$database = 'db_gourmet';

	$link = mysqli_connect($host, $user, $password, $database) or die;

	return $link;
}

function fecharConexao($link)
{
	mysqli_close($link) or die(mysqli_error($link));
}
