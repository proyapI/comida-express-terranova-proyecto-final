<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if($_SESSION["rol"] == "cliente" || $_SESSION["rol"] == "domiciliario"){    
    $producto = new Producto($_GET["idProducto"]);    
    $producto -> consultar();
    $prod = $_GET["idProducto"];
    $domiciliario = $_GET["id_domiciliario"];
    $pedido = new Pedido();
    $pedido -> consultar($_GET["idPedido"],$_GET["idCliente"],$prod,$domiciliario);
    ?>
    <div class="modal-header">
    	<h5 class="modal-title" id="exampleModalLabel"><b><?php echo "Pedido #" . $pedido -> getId_pedido() ?></b></h5>
    	<button type="button" class="close" data-dismiss="modal"
    		aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    </div>
    <div class="modal-body">     	
    	<img src="<?php echo $producto -> getImagen() ?>" width="20%"> <br><b> <?php echo "Nombre del producto: " ?> </b> 
    	<?php  echo $producto -> getNombre() ?><br><b> <?php echo "Descripcion del producto: " ?> </b> <?php  echo $producto -> getDescripcion() ?> 
    	<br><b> <?php echo "Valor por unidad: " ?> </b> <?php  echo $pedido -> getValor_unidad() ?>
    </div>    
    
    <?php    
    if ($_SESSION["rol"] == "cliente"){
        $log = new Log($_SESSION["id"],"ver","ver informacion del pedido" , date('Y-m-d'),date('H:i:s'),"cliente");
        $log -> crear();
    }else{
        $log = new Log($_SESSION["id"],"ver","ver informacion del pedido" , date('Y-m-d'),date('H:i:s'),"domiciliario");
        $log -> crear();
    }
    ?>    
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>