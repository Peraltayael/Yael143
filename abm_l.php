<?php
//include_once("libreria/motor.php");

include_once("libreria/prestamos.php");

$datos = new Prestamo();
$prestamo = new Prestamo();

include_once("menu_bs.php");

$operacion = '';

$libro = '';
$nombre = '';
$fecha = '';
$devuelto = '';


if (!isset($_SESSION['username']) || $_SESSION['rol']!='administrador'){
exit;
}
if (!empty($_POST)) {
    
    //$operacion = $_GET['operacion']  ;
	$operacion = isset($_GET['operacion']) ? $_GET['operacion'] : 'alta' ;
	//echo $operacion;
	
	if ($operacion == 'alta' && !isset($_GET['id_pers'])){
	    //echo '1-alta';
		$prestamo->libro=$_POST['txtLibro'];
		$prestamo->nombre=$_POST['txtNombre'];
		$prestamo->fecha=$_POST['txtFecha'];
		
		$prestamo->guardar();
	}
	// if ($operacion == 'actualizar' && isset($_GET['id_pers'])){
	//     // echo '2-actualizar';
	// 	$persona->nombre=$_POST['txtNombre'];
	// 	$persona->apellido=$_POST['txtApellido'];
	// 	$persona->sexo=$_POST['txtSexo'];
	// 	$persona->dni=$_POST['txtDni'];
	// 	$persona->carrera=$_POST['txtCarrera'];
	// 	$persona->telefono=$_POST['txtTelefono'];
	// 	$persona->email=$_POST['txtEmail'];
	// 	$persona->user=$_POST['txtUser'];
	// 	$persona->rol=$_POST['txtRol'];
		
	// 	$persona->actualizar($_GET['id_pers']);
	// 	header("Location: ".$_SERVER['PHP_SELF']);
	// }
	if ($operacion == 'borrar' && isset($_GET['id_pers'])){
	    //echo '3-eliminar';
		$prestamo->borrar($_GET['id_pers']);
	}
    if ($operacion == 'edicion' && isset($_GET['id_usuario'])) {
        //echo '3-edicion';
        
        $id_usuario = $_GET['id_usuario'];

        $datos=Persona::traer_datos($id_usuario);

        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $sexo = $datos['sexo'];
        $dni = $datos['dni'];
        $carrera = $datos['carrera'];
    }
   
}
?>
 
<script src="btsp/js/funciones_l.js"></script>
 
<div class="container-fluid">
   <nav class="navbar navbar-default " role="navigation" >
     
      <ul class="nav navbar-nav" style="padding-top: 10px;padding-bottom: 0px;">
	  <span style="padding-right: 20px;font-weight: bold;">Prestamos</span>
	  <button type="button" class="btn btn-primary  btn-sm"   onclick="cargar('#capa_d','alta_l.php')">Alta</button>
      </ul>      
	  
      <ul class="nav navbar-nav" style="padding-top: 10px;padding-bottom: 0px;">
        <input type="text"  id="txt_l" placeholder="Buscar" style="position: absolute;right: 100px;" >
		<button type="button" id="btn_l" class="btn btn-primary btn-sm" style="position: absolute;right: 20px;">Buscar</button>
      </ul>
	 
	   
     
	 </div> 
	 
   </nav>
 </div>


 
 
<div class="row">
 
  <div class="col-sm-6">
  <div id="capa_d">
  
  </div>
  </div>
  
  <div class="col-sm-6">
  <div id="capa_L">	
  
	    </div>
</div>



</div>
</div>
</body>

</html>