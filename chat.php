<?php 
include("libreria/conexion.php");

// defini la función formatDate que es la que si no está definida en otro lugar
function formatDate($date) {
    return date('g:i a, j M Y', strtotime($date));
}

// Cree la conexión usando la clase Conexion definida en config.php ya que $con no estaba definida
$con = new Conexion();

// aca se verifica si la conexión fue exitosa y si no da mensaje de error
if ($con->enlace->connect_error) {
    die("Error de conexión: " . $con->enlace->connect_error);
}

// Defini la consulta y se ejecuta la consulta
$query = "SELECT * FROM ( SELECT * FROM chat ORDER BY id DESC LIMIT 3) sub ORDER BY id ASC";
$run = $con->enlace->query($query);

// Verifice si la consulta fue exitosa, y salta error si no es asi
if (!$run) {
    echo "Error en la consulta: " . $con->enlace->error;
} else {
    // altera sobre los resultados de la consulta realizada
    while($row = $run->fetch_array()) :
?>
        <div id="chat_data">
            <span class="btn btn-default btn-xs"><span class="glyphicon glyphicon-user"></span>
            <b><?php echo $row['name']; ?></b></span>
            <span style="float:right;"><?php echo formatDate($row['date']); ?></span>
            <p style="color:gray;padding-left:20px;"><em><?php echo $row['msg']; ?></em></p>
        </div>
<?php 
    endwhile;
}

// Cierre de la conexión con $con close();
$con->enlace->close();
?>
