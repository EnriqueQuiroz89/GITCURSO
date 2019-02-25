<?php 
 include('conexion.php');
 ?>

<!DOCTYPE HTML>

<?php
$ide=$_GET['id'];

echo 'No se pueden mostrar los datos desde la consulta: $query !!'.$ide;
          


if (isset($_POST["btn1"]))
{
    $btn=$_POST["btn1"];
    if($btn == "Confirmar Modificaci�n")
    {
		$clave=$_POST['clave'];
		$rol=$_POST['rol'];
		
		
		if($rol==1)
		{
		$rol=1;
		}else{
		     	if($rol==2) 
			    {
			    $rol=2;
			    }else{
				$rol=3;
				     }
       
		     }
		

			 
		
		$quer= "UPDATE CLAVES_ARTICULOS SET CLAVE_ARTICULO = '$clave' WHERE CLAVE_ARTICULO_ID = '$ide'";
		$re=ibase_query($con, $quer);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('Un Alumno ha sido Actualizado');</script>";
		?>
		<script type="text/javascript">
		window.location.href="index.php";
		</script>
		<?
		
    }

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
	
	#modificar{
		background-color:#2CB1C3;
		border:0em;
		border-radius:0.7em;
		color:#FFF;
		cursor:pointer;
		font-family: "Arial";
		font-weight: bold;
		padding:0.5em;
		width:15em;
		
	}
</style>

<head>

<title>Actualizar d</title>

</head>
	
<body>
<center>	


	<p>Modificar INFORMACION del alumno</p>
	<hr width=50%>
	
	<form name="fe" action="" method="POST">
                <table id='tabla' cellpadding=7px>
                <tr>
                    <td align=center><b>Clave:  </b></td>
					<td><label><input name="clave" type="text" value="<?echo $row->CLAVE_ARTICULO?>" size=35 style="font-size:18px" autofocus/></label></td>
                </tr>
                <tr>
				
				<?
				if($row->ROL_CLAVE_ART_ID == 18)
				{
				?>
                    <td align=center><b>Rol clave:  </b></td><td><label>Clave alterna<input type="radio" name="rol" value="1" checked="checked" ></label>
					<label>Clave alterna<input type="radio" name="rol" value="1" ></label></td>
				<?}else{?>
					
	                <td align=center><b>Rol clave:  </b></td><td><label>Codigo barras<input type="radio" name="rol" value="2" ></label>
					<label>Codigo Barras<input type="radio" name="rol" value="2" checked="checked" ></label></td>
					<?}?>
                </tr>
                
               
                </table>

  
	<input id='modificar' type="submit" name="btn1" value="Confirmar Modificaci�n"/>
  

</form>

</center>	
</body>

</html>

