<?php
include("menu_bs.php");

include_once("libreria/carteles.php");


$cats=Cartel::categorias();


echo '
<div class="container-fluid" >

<div class="row">
	<div class="col-sm-8">
	  <div id="capa_C">	
	  
	  </div>
	</div>	
	  
	  </div>
	 <script>
        cargar("#capa_C", "mostrar_cartelera.php?b=Ayuda")
     </script>
 </div>
';
?>