<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if ($_SESSION["rol"]=="cliente"){
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
$cliente = new Cliente($_SESSION["id"]);
$cliente -> consultar();
$log = new Log($_SESSION["id"],"iniciar","iniciar sesion" , date('Y-m-d'),date('H:i:s'),"cliente");
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
					<h4><strong> Cliente: </strong><?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?></h4>
				</div>
				<div class="card-body">
					<?php echo "<img src='" . $cliente -> getImagen() . "' width='30%' />";?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }else{
    echo "Lo siento. Usted no tiene permisos";
}?>