<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if ($_SESSION["rol"]=="domiciliario"){
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
$domiciliario = new Domiciliario($_SESSION["id"]);
$domiciliario -> consultar();
$log = new Log($_SESSION["id"],"iniciar","iniciar sesion" , date('Y-m-d'),date('H:i:s'),"domiciliario");
$log -> crear();
?>
<div class="container">
	<div class="row mt-3">
		<div class="col">
			<div class="card">
				<div class="card-header">
					<h3>Bienvenido</h3>
				</div>
				<div class="card-body">
					<h4><strong> Domiciliario: </strong><?php echo $domiciliario -> getNombre() . " " . $domiciliario -> getApellido() ?></h4>	
				</div>
				<div class="card-body">
					<?php echo "<img src='" . $domiciliario -> getImagen() . "' width='30%' />";?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }else{
    echo "Lo siento. Usted no tiene permisos";
}?>