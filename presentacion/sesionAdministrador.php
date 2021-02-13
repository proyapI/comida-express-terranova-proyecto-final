<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if ($_SESSION["rol"]=="administrador"){
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
$administrador = new Administrador($_SESSION["id"]);
$administrador -> consultar();
$log = new Log($_SESSION["id"],"iniciar","iniciar sesion" , date('Y-m-d'),date('H:i:s'),"administrador");
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
					<h4><strong>Administrador: </strong> <?php echo $administrador -> getNombre() . " " . $administrador -> getApellido() ?></h4>
				</div>
				<div class="card-body">
					<?php echo "<img src='" . $administrador -> getImagen() . "' width='30%' />";?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php }else{
    echo "Lo siento. Usted no tiene permisos";
}?>