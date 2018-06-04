<?php

session_start();
include("datosConexion.php");

if($_POST["Entrar"]){
	
	if(isset($_POST["Nombre"]) && !empty($_POST["Nombre"]) &&
	isset($_POST["Contrasena"]) && !empty($_POST["Contrasena"])){

$conexion=mysql_connect($host,$user,$password)or die ("fallo algo en la base de datos: error en la conexion");
mysql_select_db($db,$conexion)or die ("fallo algo en la base de datos: no hay base de datos por el momento");

$select=mysql_query("SELECT Id,Name,Password from users WHERE (Name='$_POST[Nombre]' AND Password='$_POST[Contrasena]')",$conexion);
$sesion=mysql_fetch_array($select); 

if($_POST["Contrasena"]==$sesion["Password"]){
	$_SESSION["username"]=$_POST["Nombre"];
	$_SESSION["userid"]=$sesion["Id"];
	
	header("Location: General.php");
	
	}else{
		echo "algo salio mal";
		}


}else {

}		
}else if($_POST["Nuevo"]){
		header("Location: NuevoUsuario.html");
		}

?>