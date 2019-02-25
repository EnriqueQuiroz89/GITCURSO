<script type="text/javascript">/*Funci�n Js que sirve para activar una pol�tica que tiene estado Inactivo*/
	
			<?
			
			include ("conexion.php");
			$id= $_GET['id'];
			
            $query= "DELETE FROM CLAVES_ARTICULOS WHERE CLAVE_ARTICULO_ID=$id";
	/*		$query= "DELETE FROM ALUMNOS WHERE ALUMNOS_ID=$id";
    */			$res=ibase_query($con, $query);
			if(!res)
			{echo 'No se pueden mostrar los datos desde la consulta: $query !!';
			exit;}
			
		
			?>
			

			alert("El registro ha sido eliminado")
			window.location.href="index.php";	
</script>
