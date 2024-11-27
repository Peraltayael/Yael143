<?php
//include("libreria/motor.php");
include_once("libreria/prestamos.php");

$prestamo = new Prestamo();
$libro = "";
$nombre = "";
$fecha = "";
$devuelto = "";

if (!empty($_POST)) {

	$operacion = isset($_POST['operacion']) ? $_POST['operacion'] : 'edicion';
	//echo $operacion;
	if ($operacion == 'edicion') {
		$id = $_POST['id_pers'];
	}

	if ($operacion == 'baja') {


		$id = $_POST['id_pers'];

		Prestamo::borrar($id);
	}
}

?>

<div id="capa_d">
	<div class="container">

		<div class="row">

			<div class="col-sm-6">
				<form method="POST" role="form" action="editar.php">
					<div class="row">
						<div class="col-xs-2">
							<input type="hidden" name="id" value="<?php echo $id; ?>">

							<?php
							if (isset($operacion)) {
								if ($operacion == 'edicion' || $operacion == 'baja') {
									/*echo $nombre;*/
							?>
								<label for="id_pers">ID:</label>
								<input id="id_pers" name="id_pers" type="text" class="form-control" disabled value="<?php echo $id; ?>" />
							<?php
								}
							}
							?>
						</div>

						<div class="col-xs-5">
							<div class="form-group">
								<label for="ejemplo_libro">Libro</label>
								<input type="text" size="20" name="txtLibro" class="form-control" id="ejemplo_libro" placeholder="Introduce el nombre del libro" value="<?php echo $libro; ?>" />
							</div>
						</div>

						<div class="col-xs-5">
							<div class="form-group">
								<label for="ejemplo_nombre">Nombre</label>
								<input type="text" size="20" name="txtNombre" class="form-control" id="ejemplo_nombre" placeholder="Introduce el nombre" value="<?php echo $nombre; ?>" />
							</div>
						</div>

						<div class="col-xs-5">
							<div class="form-group">
								<label for="ejemplo_fecha">Fecha</label>
								<input type="date" size="20" name="txtFecha" class="form-control" id="ejemplo_fecha" placeholder="Introduce la fecha" value="<?php echo $fecha; ?>" />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<label>Devuelto</label>
								<div class="radio">
									<label>
										<input type="radio" name="txtDevuelto" value="Si">
										Si
									</label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="txtDevuelto" value="No" checked>
										No
									</label>
								</div>
							</div>
						</div>
					</div>
					<input style="display:none;" name="operacion" value="edicion">
					<button method="post" class="btn btn-default">Actualizar</button>
				</form>
			</div>
		</div>
	</div>
</div>