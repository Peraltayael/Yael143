<?php
include("motor.php");

//ESTE CODIGO FUE MIGRADO DESDE LA EXTENSION ANTIGUA MYSQL A LA NUEVA MYSQLi
//UTILIZANDO LA INTERFAZ ORIENTADA A OBJETOS (http://php.net/manual/es/mysqli.quickstart.dual-interface.php)

class Prestamo{
 public $id;
 public $libro  = null;
 public $nombre  = null;
 public $fecha  = null;
 public $devuelto = null;
 
 function guardar(){  // crea la Persona
    
   $sql="insert into prestamos(libro,nombre,fecha)
   values('$this->libro','$this->nombre','$this->fecha')";
   //mysql_query($sql);
   $objConn = new Conexion();
   $objConn->enlace->query($sql);
 }
 
function actualizar($nro=0)	// actualiza la Persona
	{
			$sql="update prestamos set 
			libro='$this->libro',
			nombre='$this->nombre',
			fecha='$this->fecha',
			devuelto='$this->devuelto'
			where id = $nro";
			//mysql_query($sql); // ejecuta la consulta para actualizar 
			$objConn = new Conexion();
   			$objConn->enlace->query($sql);
            			
	}
	
 static function borrar($nro=0)	// elimina la Persona
	{
			$sql="delete from prestamos where id=$nro";
			//mysql_query($sql); // ejecuta la consulta para eliminar
			$objConn = new Conexion();
            $objConn->enlace->query($sql);
			
	
	}	
	
static function traer_datos($nro=0) // declara el constructor, si trae el numero de persona lo busca 
	{
		if ($nro!=0)
		{
			$sql="select * from prestamos where id = $nro";
			//$result=mysql_query($sql);
			$objConn = new Conexion();
            $result = $objConn->enlace->query($sql);
			$recs=mysqli_num_rows($result);
			$row=mysqli_fetch_array($result);
			$id=$row['id'];
			//$nombre=$row['nombre'];
			//$nombre="ALGO";
			//$apellido=$row['apellido'];
			//$sexo=$row['sexo'];
			//$matricula=$row['matricula'];
			//$carrera=$row['carrera'];
			return $row;
		}
	}	
 
 
 
 static function buscar($str){
    $sql="select * from prestamos where libro like '%$str%' or nombre like '%$str%' or fecha like '%$str%' or devuelto like '%$str%'";
    //$rs=mysql_query($sql);
	$objConn = new Conexion();
	$rs=$objConn->enlace->query($sql);
	$est=array();
	//while($fila=mysql_fetch_assoc($rs) > 0){
	while($fila=mysqli_fetch_assoc($rs)){
	  $est[]=$fila;
	}return $est;
 
 }
 
 }