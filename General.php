<?php 
	
	session_start();
	
	if(isset($_SESSION["userid"])){
		
		echo "sesion iniciada correctamente";
			
		echo	"<br><a href=cerrar_sesion.php>Cerrar Session</a>";		
		
		include("datosConexion.php");
		
$conexion=mysql_connect($host,$user,$password)or die ("fallo algo en la base de datos: error en la conexion");
mysql_select_db($db,$conexion)or die ("fallo algo en la base de datos: no hay base de datos por el momento");

$select=mysql_query("SELECT Id,TypeID,Name,StartDate,FinishDate from projects WHERE (UserID='$_SESSION[userid]' AND Deleted=0)",$conexion);
echo "<table width='400' border='0'>";

echo "<tr>";
echo "<td>Tipo de Projecto</td>";
echo "<td>Nombre</td>";
echo "<td>Fecha de comienzo</td>";
echo "<td>Fecha de termino</td>";
echo "<td>Eliminar</td>";
echo "<td>Editar</td>";
echo "</tr>";

while($sesion = mysql_fetch_array($select)){

echo "<tr>";
echo "<td>".$sesion['TypeID']."</td>";
echo "<td>".$sesion['Name']."</td>";
echo "<td>".$sesion['StartDate']."</td>";
echo "<td>".$sesion['FinishDate']."</td>";
echo "<td><a href='borrar.php?id=".$sesion['Id']."'>Eliminar</a></td>";
echo "<td><a href='editar.php?id=".$sesion['Id']."'>Editar</a></td>";
echo "</tr>";
}	
echo "</table>";
echo "<a href='nuevoProyecto.html?id=".$_SESSION['userid']."'>Nuevo proyecto</a>";

	}else{
			echo "sesion no iniciada";
		}
	
?>