<?php
require 'logica/Log.php';
date_default_timezone_set('America/Bogota');
if ($_SESSION["rol"]=='cliente'){
    $idpedido = $_GET["id_pedido"];    
    $domiciliario = $_GET["id_domiciliario"];
    $dom = new Domiciliario($domiciliario);
    $dom -> consultar();
    $pedido = new Pedido();
    $pedidos = $pedido -> consultar($idpedido);
    $fecha = $pedido ->fecha($idpedido);
    $total = $pedido ->valor($idpedido);
    $cliente = new Cliente($_SESSION["id"]);
    $cliente -> consultar();?>
<div class="container">
	<div class="row mt-3">
		<div class="col-5">
			<div class="card">
				<div class="card-header">
					<h5 class="text-center"><img src="img/logo.jpg" width="50%"></h5> 
					<h5 class="text-center"><b> <?php echo "COMIDA EXPRESS TERRANOVA" ?> </b></h5>
					<h5 class="text-center"><b><?php echo "FACTURA DEL PEDIDO #" . $idpedido ?></b></h5>
				</div>
				<div class="card-body">         				                                                    
					<h6><b> <?php echo "FECHA Y HORA: "?></b><?php echo $fecha ?></h6>                        
                    <h6><b> <?php echo "CLIENTE: "?></b><?php echo $cliente -> getNombre() . " " . $cliente -> getApellido() ?> </h6>
                    <h6><b> <?php echo "LOCALIDAD, CIUDAD: " ?></b><?php echo $cliente -> getLocalidad() . ", " . $cliente -> getCiudad() ?></h6>                      
                    <h6><b> <?php echo "TELEFONO: "?></b><?php echo $cliente -> getTelefono()?></h6>
                    <h6><b> <?php echo "CORREO: "?></b><?php echo $cliente -> getCorreo()?></h6>                            
                    <?php foreach ($pedidos as $p){
                    	$producto = new Producto($p->getId_prod());
    					$producto -> consultar();?>
                       	<h6><b> <?php echo "PRODUCTO: "?></b><?php echo $producto -> getNombre() . ": " . $producto -> getDescripcion()?></h6>
                       	<h6><b> <?php echo "VALOR_UNIDAD: "?></b><?php echo $producto -> getValor()?></h6>
                       	<h6><b> <?php echo "UNIDADES: "?></b><?php echo $p -> getUnidades()?></h6>                        	                        	
                    <?php }?>
                    <h6><b> <?php echo "VALOR_TOTAL: "?></b><?php echo $total ?></h6>
                    <h6><b> <?php echo "DOMICILIARIO: "?></b><?php echo $dom -> getNombre() . " " . $dom -> getApellido() ?></h6>
                    <h6><b> <?php echo "LOCALIDAD, CIUDAD: " ?></b><?php echo $dom -> getLocalidad() . ", " . $dom -> getCiudad() ?></h6>                      
                    <h6><b> <?php echo "TELEFONO DEL DOMICILIARIO: "?></b><?php echo $dom -> getTelefono()?></h6>
                    <h6><b> <?php echo "CORREO DEL DOMICILIARIO: "?></b><?php echo $dom -> getCorreo()?></h6>
                   	<button onclick="location.href='<?php echo "index.php?pid=" . base64_encode("presentacion/pedido/consultarPedido.php")?>'" class="btn btn-primary btn-block">Volver</button>                        
				</div>
			</div>
		</div>
	</div>
</div>
<?php   $log = new Log($_SESSION["id"],"generar","generar factura" , date('Y-m-d'),date('H:i:s'),"cliente");
        $log -> crear();
    }else{
    echo "Lo siento. Usted no tiene permisos";
}
?>