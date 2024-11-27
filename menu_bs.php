<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
 <head>
   <title>BASES PWD</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous"><!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" > -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous"><!-- <script src="bootstrap/js/jquery-3.1.0.min.js"></script> -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script><!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
   <script src="bootstrap/js/funciones_gral.js"></script>
   <link rel="stylesheet" href="bootstrap/css/style_chat.css" media="all"/> 
   <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script><!-- <link rel="stylesheet" href="bootstrap/ui/jquery-ui.css"> -->
   <link rel="stylesheet" href="bootstrap/cust.css">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script><!-- <script src="bootstrap/ui/jquery-ui.js"></script> -->

     
   <!-----https://sourcecodesite.com/how-to-create-chat-system-in-php-using-ajax-2.html--->
   <!--Include Custom CSS-->
   <!---
   <script src="bootstrap/js/funciones_e.js"></script>
   <script src="bootstrap/js/funciones_d.js"></script>
   --->
   <script>
   function cargar(div,desde)
   {
   $(div).load(desde);
   } 
   </script>
   <script>
   function poner_nombre(div,nombre)
   {
   $(div).text(nombre);
   } 
   </script>
   <style>
pre {
    display: block;
    font-family: arial;
    white-space: pre;
    margin: 2em 0;
} 
#background {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('images/b_bkg_3.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;
    opacity: 0.6;
    filter:alpha(opacity=50);
}

.navbar-custom .navbar-nav > li > a,
.navbar-custom .navbar-brand {
    color: #FFFFFF;
    /* bg-danger */
}

</style>
 </head>
 
 <!-----body style="padding: 0px 0px 0px 0px;background-image: url(images/b_bkg_4.jpg);" onload="cargar('#capa_P','txts/init_1.html');cargar('#capa_C','txts/init_2.html')"---->
 <body style="padding: 0px 0px 0px 0px;">
 <div id="background"></div>
 <div class="container-fluid">
  <nav class="navbar navbar-inverse navbar-static-top navbar-custom" role="navigation">
    
    <ul class="nav navbar-nav ">
      <li><a class="navbar-brand"><img src="images/dino.jpg" alt="logo" width="50" height="30"></a></li>
      <li><a href="index.php"><span class="glyphicon glyphicon-home"> Yael</span></a></li>
      <li><a href="cartelera.php">Cartelera</a></li>
      <li><a href="abm_ld.php">Libros</a></li>
      <li><a href="abm_l.php">Material Impresos</a></li>
      <li><a href="ayuda.php">Ayuda</a></li>

      <?php
      if (isset($_SESSION['username']) && $_SESSION['rol']=='administrador'){
        echo '<li><a href="abm_p.php">Usuarios</a></li>';
        echo '<li><a href="abm_c.php">Carteles</a></li>';
      }
      ?>
    </ul>

    <?php
// Mostrar la cantidad de usuarios activos solo si es administrador
if (isset($_SESSION['username']) && $_SESSION['rol'] == 'administrador') {
    echo '<li><a href="#">Usuarios activos: <span id="activeUsers">0</span></a></li>';
    echo '
    <script>
        var conn = new WebSocket("ws://localhost:8080/users");
        conn.onmessage = function(e) {
            var data = JSON.parse(e.data);
            document.getElementById("activeUsers").innerText = data.activeUsers;
        };
    </script>';
}
?>

    <ul class="nav navbar-nav navbar-right" style="padding-right: 10px;">
      
    <?php
    if (isset($_SESSION['username'])) {
    echo ' <li class="navbar-brand">'.$_SESSION['rol'].' : '.$_SESSION['username'].'</li>'; 
      }
    ?>
    
      
<?php
    if (!isset($_SESSION['username'])){
      echo '    
          <li><a href="registro.php"  data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-user"></span> Registro</a></li>
             ';
        echo '    
          <li><a href="login.php" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
             ';
      }  
    else{
      echo '    
        <li><a href="i_chat.php">Chat</a></li>
          <li><a href="logout.php" ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
             ';
         }
?>       
  </ul>
    
    
   
   
   </nav>
  

  
  
 
  
 <!-- Modal -->
 
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



</div>
 
</body>
</html>