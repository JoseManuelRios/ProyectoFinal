<?php 
require "config_bd.php";

function conectar()
{
	@$con=mysqli_connect(SERVIDOR_BD,USUARIO_BD,CLAVE_BD,NOMBRE_BD);
	return $con;
}
?>
