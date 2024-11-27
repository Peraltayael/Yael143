<?php
include("libreria/motor.php");

$id=$_POST['id'];

$sql="update prestamos set ";

if(isset($_POST['txtNombre']) && ! $_POST['txtNombre'] == ""){
  $nombre = $_POST['txtNombre'];
  $sql .= "nombre='$nombre',";
}

if(isset($_POST['txtFecha']) && ! $_POST['txtFecha'] == ""){
  $fecha = $_POST['txtFecha'];
  $sql .= "fecha='$fecha',";
}

if(isset($_POST['txtLibro']) && ! $_POST['txtLibro'] == ""){
  $libro = $_POST['txtLibro'];
  $sql .= "libro='$libro',";
}

if(isset($_POST['txtDevuelto']) && ! $_POST['txtDevuelto'] == ""){
  $devuelto = $_POST['txtDevuelto'];
  if($devuelto == "Si") $sql .= "devuelto=1";
  else if($devuelto == "No") $sql .= "devuelto=0";
  
}

$sql .= " where id = $id";

echo $sql;
//mysql_query($sql); // ejecuta la consulta para actualizar 
$objConn = new Conexion();
$objConn->enlace->query($sql);

header("location: abm_l.php")

?>