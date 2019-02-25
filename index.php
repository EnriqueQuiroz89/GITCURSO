
<?include ("conexion.php")?>

<!DOCTYPE>

<style>
	
	body{
		font-family:"Segoe UI";
		font-size:32px;
	}
	
	#tabla{
	font-size:"20px";
	}
	
	a:link {
	text-decoration:none;
	color:#0000cc;} 
	
	a:visited {
	text-decoration:none;
	color:#0000cc;} 
	
	a:active {
	text-decoration:none;
	color:#0000cc;} 
	
	a:hover {
	text-decoration:underline;
	color:#999999;} 
	
	#nuevo{
		background-color:#2CB1C3;
		border:0em;
		border-radius:0.7em;
		color:#FFF;
		cursor:pointer;
		font-family: "Arial";
		font-weight: bold;
		padding:0.5em;
		width:10em;
		
	}
</style>
<html lang="es">

<sty

<head>
	<title>SISTEMA DE PRUEBA</title>
</head>

<body>
<center>
	<h2>Bienvenidos al sistema</h2>
	<p>Listado de CLAVES</p>
	<hr width=50%>
	<br>
	
	<?
		$query= "SELECT a.CLAVE_ARTICULO_ID, a.CLAVE_ARTICULO, a.ARTICULO_ID, a.ROL_CLAVE_ART_ID FROM CLAVES_ARTICULOS a WHERE A.CLAVE_ARTICULO_ID>'13288721' ";
		$res=ibase_query($con, $query);
		if(!res)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<table border=1 rules=none width=600px cellpadding=5px id=tabla>\n";
		echo "
				<tr>
				<td align=center><b>CLAVE_ARTICULO_ID</b></td> 
				<td align=center><b>CLAVE_ARTICULO</b></td>
				<td align=center><b>ROL_CLAVE_ARTICULO_ID</b></td>
                                <td align=center><b>ACCION</b></td>
				</tr>
				
				<tr>
				<td align=center><hr> </td> 
				<td align=center><hr> </td>
				<td align=center><hr> </td>
				</tr>
				
		\n";
		
		while($row=ibase_fetch_object($res))
		{
			
			echo "
				
				<tr>
				<td align=center>$row->CLAVE_ARTICULO_ID</td> 
				<td align=center>$row->CLAVE_ARTICULO</td> 
				<td align=center>$row->ROL_CLAVE_ART_ID</td> 
                <td align=center> <a href='eliminar.php?id=$row->CLAVE_ARTICULO_ID'>Eliminar</a> | <a href='modificar.php?id=$row->CLAVE_ARTICULO_ID'>Modificar</a></td>
				</tr>\n";
		}
		echo "</table>\n";
	?>
	
	<br>
	<form name=frmenviar id=enviar method=POST action=nuevo.php>
	<input id='nuevo' type=submit name=enviarinfo value='Nuevo Alumno'>
	</from>
	</center>
</body>

</html>