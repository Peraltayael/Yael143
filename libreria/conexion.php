<?php
class Conexion extends mysqli{

 public $enlace;
 
 function __construct(){
   $this->enlace=mysqli_connect('localhost','root','','biblio_t1');
 }
  
 }
 function __destruct(){
   //mysql_close($this->enlace);
   mysqli_close($this->enlace);
 }

