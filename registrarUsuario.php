<?php

	include("datosConexion.php");

if($_POST["Guaradar"]){
	
	if(isset($_POST["nNombre"]) && !empty($_POST["nNombre"]) &&
	isset($_POST["nApellido"]) && !empty($_POST["nApellido"]) &&
	isset($_POST["nEmail"]) && !empty($_POST["nEmail"]) &&
	isset($_POST["nContrasena"]) && !empty($_POST["nContrasena"]) &&
	isset($_POST["nChecContra"]) && !empty($_POST["nChecContra"]) &&
	$_POST["nContraseña"]==$_POST["nChecContraseña"]){

$conexion=mysql_connect($host,$user,$password)or die ("fallo algo en la base de datos: error en la conexion");
mysql_select_db($db,$conexion)or die ("fallo algo en la base de datos: no hay base de datos por el momento");

mysql_query("INSERT INTO users (Email,Name,LastName,Password) VALUES ('$_POST[nEmail]','$_POST[nNombre]','$_POST[nApellido]','$_POST[nContrasena]')",$conexion);
header("Location: login.html/?mensage=correcto");
	}else {
		header("Location: NuevoUsuario.html/?mensage=fallo");
		}
		
}else if($_POST["Cancelar"]){
		header("Location: login.html");
		}

?>


	