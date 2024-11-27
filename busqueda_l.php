<?php
//include_once("libreria/motor.php");
include_once("libreria/prestamos.php");

$str_b =  $_POST['b'];
//echo $str_b;
$prest=Prestamo::buscar($str_b);

?>
<?php
if (isset($prest)){
?>

<div class="panel panel-default " >
 
  <div class="panel-heading " >Prestamos Encontrados</div> 
	<div  style="overflow: scroll;height: 350px;">
	 <table class="tabla_edicion table table-hover">
	  <thead>
			  <tr>
			  <th id="proceso">Id</th>
              <th>Libro</th>
			  <th>Nombre</th>
			  <th>Fecha</th>
			  <th>Devuelto</th>
			  
			  </tr>
		  </thead>
	   
	  <tbody>
	 
	  
	  <?php
		  foreach($prest as $prestamo){
		   echo "
		   <tr>
		   <td>$prestamo[id]</td>
		   <td>$prestamo[libro]</td>
		   <td>$prestamo[nombre]</td>
		   <td>$prestamo[fecha]</td>";

		   if($prestamo['devuelto'] == 0){echo"<td>No</td>";}
		   else {echo"<td>Si</td>";}
	  
	     echo '<td><button class="btn btn-primary btn-xs" onclick="editar(' . $prestamo['id'] . ')" >Editar</button></td>';
		 echo '<td><button class="btn btn-primary btn-xs" onclick="borrar(' . $prestamo['id'] . ')" >Borrar</button></td>';
         
		  echo " </tr> ";
		   }
	  ?>
	
	  </tbody>
	  
	  </table>
  
	  </div></div>
	  </div>
	 
	  
<?php
}
?>