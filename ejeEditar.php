<?php 
session_start();

if($_POST["Guardar"]){
	
	if(isset($_SESSION["userid"])){
		$id = $_POST['id'];
		
		echo "sesion iniciada correctamente";
				echo "'$_SESSION[userid]'";
		echo	"<br><a href=cerrar_sesion.php>Cerrar Session</a>";		
		
		include("datosConexion.php");
		
$conexion=mysql_connect($host,$user,$password)or die ("fallo algo en la base de datos: error en la conexion");
mysql_select_db($db,$conexion)or die ("fallo algo en la base de datos: no hay base de datos por el momento");

mysql_query("UPDATE projects set TypeId='$_POST[Tipo]',Name='$_POST[Nombre]',StartDate='$_POST[Fcomienzo]',FinishDate='$_POST[Ftermino]' WHERE (Id=$id)",$conexion);
header("Location: General.php");
	}
}else{
	header("Location: General.php");
	}
?>