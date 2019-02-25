<?php 
 include('conexion.php');
 ?>

<!DOCTYPE HTML>

<?php
$ide=$_GET['id'];

echo 'No se pueden mostrar los datos desde la consulta: $query !!'.$ide;
          
$query= "SELECT   a.CLAVE_ARTICULO, a.ARTICULO_ID , a.ROL_CLAVE_ART_ID FROM CLAVES_ARTICULOS a WHERE a.CLAVE_ARTICULO_ID=$ide";
	/*	$query= "SELECT A.ALUMNOS_ID, A.ALUMNOS_NOMBRE, B.SEXO_ID FROM ALUMNOS A INNER JOIN SEXO B ON A.ALUMNOS_SEXO_ID=B.SEXO_ID WHERE ALUMNOS_ID=$id";*/
		$res=ibase_query($con, $query);
		if(!res)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		$row=ibase_fetch_object($res);
  

if (isset($_POST["btn1"]))
{
    $btn=$_POST["btn1"];
    if($btn == "Confirmar Modificaci�n")
    {
		$clave=$_POST['clave'];
		$rol=$_POST['rol'];
				 
		if($rol==1  )   /*oPCION 1 DEL CHECK */
		{
		   $rol=18;
		}else{
			   if($rol==2)        /*oPCION 2 DEL CHECK */
			   {
			   $rol=321073;
			   }
               else{                /*oPCION 3 DEL CHECK */
				    if($rol==3)        /*oPCION 2 DEL CHECK */
			          {
			           $rol=321076;
			          }	
				   
				   }
				   

		 	    
		     }

		
		$quer= "UPDATE CLAVES_ARTICULOS SET CLAVE_ARTICULO='$clave',ROL_CLAVE_ART_ID='$rol' WHERE CLAVE_ARTICULO_ID = '$ide'";
		$re=ibase_query($con, $quer);
		if(!re)
		{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
		exit;}
		
		echo "<script> alert('LA CLAVE HA SIDO ACTUALIZADA');</script>";
		?>
		<script type="text/javascript">
		window.location.href="index.php";
		</script>
		<?
		
    }

} /*AQUI CIERRA EL IF*/
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

<title>Actualizar CLAVE</title>

</head>
	
<body>
<center>	


	<p>Modificar INFORMACION de la clave</p>
	<hr width=50%>
	
	<form name="fe" action="" method="POST">
                <table id='tabla' cellpadding=7px>
                <tr>
                    <td align=center><b>Clave:  </b></td>
					<td><label><input name="clave" type="text" value=<?echo $row->CLAVE_ARTICULO?> size=35 style="font-size:18px" autofocus/></label></td>
                </tr>
      
                  <tr>	
					  

				   <?
				if($row->ROL_CLAVE_ART_ID == 18)
				   	{?>
					
					<td align=center><b>Rol clave:  </b></td>
					<td>
					<label>Clave alterna<input type="radio" name="rol" value="1" checked="checked" ></label>	
					<label>Codigo Barras<input type="radio" name="rol" value="2"  ></label>
				 	<label>Clave Proveedor<input type="radio" name="rol" value="3"  ></label>
				    </td>
							
					<?}else{
					   if($row->ROL_CLAVE_ART_ID == 321073){
						?>
				
				    <td align=center><b>Rol clave:  </b></td>
					<td>
					<label>Clave alterna<input type="radio" name="rol" value="1" ></label>	
					<label>Codigo Barras<input type="radio" name="rol" value="2" checked="checked"></label>
				 	<label>Clave Proveedor<input type="radio" name="rol" value="3"  ></label>
				    </td>
														 <?} 
					else {?>
					<? if($row->ROL_CLAVE_ART_ID == 321076){
						 ?>
	   
	                   <td align=center><b>Rol clave:  </b></td>
					   <td>
				       <label>Clave alterna<input type="radio" name="rol" value="1" ></label>	
					   <label>Codigo Barras<input type="radio" name="rol" value="2" ></label>
				 	   <label>Clave Proveedor<input type="radio" name="rol" value="3"  checked="checked" ></label>
				       </td>                               <?}?>
					    <?}?>
               			  <?}?>

                </tr>
                
               
                </table>

  
	<input id='modificar' type="submit" name="btn1" value="Confirmar Modificaci�n"/>
  

</form>

</center>	
</body>

</html>

