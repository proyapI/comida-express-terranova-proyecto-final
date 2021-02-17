<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "administrador" || $_SESSION["rol"] == "cliente" || $_SESSION["rol"] == "domiciliario"){
    $id = $_GET["id"];
    $prod = $_GET["prod"];
    $actor = $_GET["actor"];
    $idA = $_GET["idA"];
    $proceso = new Proceso($id);
    $proceso ->consultar();
    $producto = new Producto($prod);    
    $producto -> consultar();
    if ($actor == "cliente"){
        $cliente = new Cliente($idA);
        $cliente ->consultar();
    }else{
        $domiciliario = new Domiciliario($idA);
        $domiciliario ->consultar();
    }
?>
<div class="container">
	<div class="row mt-3">
		<div class="col-4">
			<div class="card">
				<div class="card-header">
					<h5><b><?php echo "Actividad: " . $proceso->getDatos() ?></b></h5>
				</div>
				<div class="card-body">								
                    <h5><b><?php echo "Proceso #" . $id ?></b></h5>
                    <?php if ($actor == "cliente"){?>     	
                    	<h6><b> <?php echo "Cliente: " ?> </b> <?php  echo $cliente -> getNombre() . " " . $cliente->getApellido() ?></h6>
                    <?php }else{?>
                    	<h6><b> <?php echo "Cliente: " ?> </b> <?php  echo $cliente -> getNombre() . " " . $cliente->getApellido() ?>
    	                	<br><b> <?php echo "Domiciliario: " ?> </b> <?php  echo $domiciliario -> getNombre() . " " . $domiciliario->getApellido() ?></h6>
                    <?php }?>
                    <h6><b> <?php echo "Nombre del producto: " ?> </b> <?php  echo $producto -> getNombre() ?><br>                    
                    <b> <?php echo "Descripcion del producto: " ?> </b> <?php  echo $producto -> getDescripcion() ?> 
                    <br><b> <?php echo "Valor por unidad: " ?> </b> <?php  echo $producto -> getValor() ?></h6>
                    <button onclick="location.href='<?php echo "index.php?pid=" . base64_encode("presentacion/proceso/consultarProceso.php")?>'" class="btn btn-primary btn-block">Volver</button>
                </div>
                <br>                   
            </div>            
        </div>
    </div>
</div>
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>