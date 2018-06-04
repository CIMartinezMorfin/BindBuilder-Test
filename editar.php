<?php 
	
	session_start();
	
	if(isset($_SESSION["userid"])){
		$id = $_GET['id'];
		
		echo "sesion iniciada correctamente";
				echo "'$_SESSION[userid]'";
		echo	"<br><a href=cerrar_sesion.php>Cerrar Session</a>";		
		
		include("datosConexion.php");
		
$conexion=mysql_connect($host,$user,$password)or die ("fallo algo en la base de datos: error en la conexion");
mysql_select_db($db,$conexion)or die ("fallo algo en la base de datos: no hay base de datos por el momento");

$select=mysql_query("SELECT Id,TypeID,Name,StartDate,FinishDate from projects WHERE (Id=$id)",$conexion);
$sesion = mysql_fetch_array($select);

echo "<form action='ejeEditar.php' method='post' name='formEdit'>";
echo "<input type='hidden' name='id' value='$id'/>";
echo "<table width='400' border='0'>";

echo "<tr>";
echo "<td>Tipo de Projecto</td>";
echo "<td><input type='text' name='Tipo' value='".$sesion['TypeID']."'/></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Nombre</td>";
echo "<td><input type='text' name='Nombre' value='".$sesion['Name']."'/></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Fecha de comienzo</td>";
echo "<td><input type='text' name='Fcomienzo' value='".$sesion['StartDate']."'/></td>";
echo "</tr>";

echo "<tr>";
echo "<td>Fecha de termino</td>";
echo "<td><input type='text' name='Ftermino' value='".$sesion['FinishDate']."'/></td>";
echo "</tr>";

echo "<tr>";
echo "<td><input type='submit' name='Guardar' value='Guardar'/></td>";
echo "<td><input type='submit' name='Cancelar' value='Cancelar'/></td>";
echo "</tr>";
  
echo "</table>";

	}else{
			echo "sesion no iniciada";
		}
	
?>