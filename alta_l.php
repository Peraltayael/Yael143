<?php
//include("libreria/motor.php");
include_once("libreria/prestamos.php");

$prestamo = new Prestamo();
$libro="";
$nombre="";
$fecha="";


if (!empty($_POST)) {
    
    //$operacion = $_GET['operacion'];
	$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : 'alta' ;
	
	//echo "*".$operacion."*";
	
	if ($operacion == 'alta'){
	    //echo '1-alta';
		$prestamo->libro=$_POST['txtLibro'];
		$prestamo->nombre=$_POST['txtNombre'];
		$prestamo->fecha=$_POST['txtFecha'];
		
		$prestamo->guardar();
	}
}
?>

<div id="capa_l">
<div class="container">
  
<div class="row" >
 
<div class="col-sm-6" > 
   
  <form  role="form" method="POST" action="">
  <legend>Agregar prestamo</legend>
     
     <div class="row">  	   
		   <div class="col-xs-4">
			 <div class="form-group">
			   <label for="ejemplo_libro">Libro</label>
			   <input type="text"  size="20" name="txtLibro" class="form-control" id="ejemplo_libro"
					   placeholder="Introduce el nombre del libro" />
			 </div>
		 </div>		   
	  
		   <div class="col-xs-4">
			 <div class="form-group">
			  <label for="ejemplo_nombre">Nombre</label>
			  <input type="text"  size="20" name="txtNombre" class="form-control" id="ejemplo_nombre"
					   placeholder="Introduce el Nombre de la persona" />
			 </div> 
		   </div>   
		   <div class="col-xs-4">
			 <div  class="form-group">
			 <label for="ejemplo_fecha">Fecha</label>
			    <input type="date" name="txtFecha" class="form-control" id="ejemplo_fecha">
			 </div>
		   </div>
        </div>
		 
  		
  
  <button method="post" type="submit" class="btn btn-default" >Guardar</button>
   
  </form>
  </div>
  </div>
  

</div>
</div>
