<!DOCTYPE>

<?
include('conexion.php');

if (isset($_POST["btn1"]))
{
    $btn=$_POST["btn1"];
    if($btn == "Confirmar nuevo registro")
    {
		$clave=$_POST['clave'];
        $articulo_id=$_POST['articulo_id'];

		$rol_art=$_POST['rol'];
	
		if($rol==1)
		{
		  $rol=18;
		}
                  else{

                      if($rol==2)
                      {
                      $rol=321073;
                      }
                       else{
                            $rol=321076;
                            }
					 }
	 } 
		
		
		
		$quer= "INSERT INTO CLAVES_ARTICULOS (CLAVE_ARTICULO_ID, CLAVE_ARTICULO, ARTICULO_ID, ROL_CLAVE_ART_ID) VALUES(-1,'$clave','$articulo_id','$rol')"; 
		/* 	
		"INSERT INTO ALUMNOS(ALUMNOS_NOMBRE,ALUMNOS_SEXO_ID) VALUES('$nombre','$sex')";
		*/
		
		$re=ibase_query($con, $quer);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Alumno ha sido Almacenado en la Base de Datos');</script>";
		?>
		<script type="text/javascript">
		window.location.href="index.php";
		</script>
		<?
		
}


?>

<html>

<style>
	
	body{
		font-family:"Segoe UI";
		font-size:32px;
	}
	
	#tabla
	{
		font-size: 20px;
	}
	
	#crear{
		background-color:#2CB1C3;
		border:0em;
		border-radius:0.7em;
		color:#FFF;
		cursor:pointer;
		font-family: "Arial";
		font-weight: bold;
		padding:0.5em;
		width:20em;
		
	}
</style>

<head>
	<title>Nuevo alumno</title>
</head>

<body>
<center>
	<p>Registrar nueva CLAVE</p>
	<hr width=50%>
	
	<form name="fe" action="" method="POST">
                <table id='tabla' cellpadding=7>
                <tr>
                    <td align="center"><b>Clave:  </b></td><td><label><input name="clave" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                <tr>
                    <td align="center"><b>Articulo_id:  </b></td><td><label><input name="articulo_id" type="text" size=35 style="font-size:18px" required autofocus/></label></td>
                </tr>
                
                <tr>
		    <td align="center"><b>Rol clave: </b></td><td>
                    <label>Clave alterna<input type="radio" name="rol" value="1"></label>
		            <label>Codigo barras<input type="radio" name="rol" value="2" ></label>
                    <label>Clave proveedor<input type="radio" name="rol" value="3" ></label>
                    </td>
		</tr>
                
               
                </table>

    <input id='crear' type="submit" name="btn1" value="Confirmar nuevo registro"/>
  

</form>

</center>
</body>

</html>

