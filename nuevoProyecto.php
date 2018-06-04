<?php
session_start();

if($_POST["Guardar"]){
	
	if(isset($_SESSION["userid"])){
		
		include("datosConexion.php");
		
$conexion=mysql_connect($host,$user,$password)or die ("fallo algo en la base de datos: error en la conexion");
mysql_select_db($db,$conexion)or die ("fallo algo en la base de datos: no hay base de datos por el momento");

mysql_query("INSERT INTO projects (Id, UserID, TypeId, Name, StartDate, FinishDate, Deleted) VALUES (NULL, '$_SESSION[userid]', '$_POST[Tipo]', '$_POST[Nombre]', '$_POST[Fcomienzo]', '$_POST[Ftermino]', '0');",$conexion);

header("Location: General.php");
	}
}else{
	header("Location: General.php");
	}

	

?>