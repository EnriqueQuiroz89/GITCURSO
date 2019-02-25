<?include ("conexion.php")?>


<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>Busqueda tiempo real con jquery, PHP y Mysql - BaulPHP</title>
<script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script type="text/javascript">
$(document).ready(function () {
   (function($) {
       $('#FiltrarContenido').keyup(function () {
            var ValorBusqueda = new RegExp($(this).val(), 'i');
            $('.BusquedaRapida tr').hide();
             $('.BusquedaRapida tr').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
                })
      }(jQuery));
});
</script> 
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">BaulPHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
           
            <li class="nav-item active">
              <a class="nav-link" href="registro.php">Registrar <span class="sr-only">(current)</span></a>
            </li>  
                  
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->

<div class="container">
 <h1 class="mt-5">Busqueda tiempo real con jquery</h1>
 <hr>
<?php
if(isset($_GET["option"])){?>
 <div class="alert alert-success" role="alert">
  <strong>Hecho!</strong> El registro ha sido guardado con exito.
</div>
<?php }?>
<div class="row">
  <div class="col-12 col-md-12">

   <!-- Contenido -->    
			

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Buscar</span>
  </div>
  <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingrese Nombre de Alumno" aria-label="Alumno" aria-describedby="basic-addon1">
</div>
	    <table class="table table-hover">
        <thead>
          <tr>
            <th>Nº</th>
            <th>Nombres y Apellidos</th>
            <th>Celular</th>            
            <th>E-Mail</th>
          </tr>
        </thead>
        <tbody class="BusquedaRapida">
<?php
 /*$con = connect();
 $consulta = "SELECT * FROM alumnos";
 $resultado = mysqli_query($con , $consulta);
 $contador=0;
 */
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






</tbody>
      </table>		
<!-- Fin Contenido --> 
</div>



</div><!-- Fin row -->


</div><!-- Fin container -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted"><p>Códigos <a href="https://www.baulphp.com/" target="_blank">BaulPHP</a></p></span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
  </body>
</html>