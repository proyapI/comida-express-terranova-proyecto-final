<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "cliente"){
    $producto = new Producto();
    $producto -> consultar();
    $agregado = false;        
    if(isset($_POST["agregar"])){                    
            $valorTotal = $_POST["unidades"] * $_POST["valor"];
            $carrito = new Cliente_producto();
            $carrito -> consultar($_SESSION["id"], $_POST["id_prod"]);            
            if ($carrito ->getCantidad_und() != ''){                                  
                    $suma = $carrito -> getCantidad_und() + $_POST["unidades"];
                    if ($suma > 0 && $suma <= $_POST ["cantidadU"]){
                        $valorTotalP = $suma * $_POST["valor"];
                        $carrito -> actualizarUnidadesyTotal($_SESSION["id"], $_POST["id_prod"], $suma ,$valorTotalP);
                        $agregado = true; 
                    }
                    else{
                        echo "<script>alert('Stock no disponible, no puede agregar la cantidad de unidades');window.location = 'index.php?pid=".base64_encode("presentacion/producto/comprarProducto.php"). "&id_prod=" . $_POST["id_prod"] ."';</script>";
                    }
            }
            else{
                if ($_POST["unidades"] > 0 && $_POST["unidades"] <= $_POST ["cantidadU"]){
                    $carrito = new Cliente_producto($_SESSION["id"], $_POST["id_prod"], $_POST["nombreP"], $_POST["unidades"], $valorTotal);
                    $carrito -> crear();
                } elseif ($_POST["unidades"] == 0){
                    echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/producto/consultarProducto.php"). "&id_prod=" . $_POST["id_prod"] ."';</script>";
                }elseif($_POST["unidades"] < 0){
                    echo "<script>alert('La cantidad de unidades que intenta agregar no es valida');window.location = 'index.php?pid=".base64_encode("presentacion/producto/comprarProducto.php"). "&id_prod=" . $_POST["id_prod"] ."';</script>";
                }else{
                    echo "<script>alert('Stock no disponible, no puede agregar la cantidad de unidades');window.location = 'index.php?pid=".base64_encode("presentacion/producto/comprarProducto.php"). "&id_prod=" . $_POST["id_prod"] ."';</script>";
                }
            }                       
            $agregado = true;            
            date_default_timezone_set('America/Bogota');
            $log = new Log($_SESSION["id"],"agregar","agregar al carrito el producto: " . $_POST["nombreP"] , date('Y-m-d'),date('H:i:s'),"cliente");
            $log -> crear();                  
            $proceso = new Proceso("","agregar al carrito el producto: " . $_POST["nombreP"] , date('Y-m-d'),date('H:i:s'), $_POST["id_prod"],"cliente",$_SESSION["id"]);
            $proceso -> crear();                  
    }
    else{
        $producto = new Producto($_GET["id_prod"]);
        $producto -> consultar();
    }
    ?>
	<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>    		
    		<div class="col-6">
    			<div class="card">    
        			<div class="card-header">
        				<h3>Agregar Producto</h3>
        			</div>				
    				<div class="card-body">
    					<?php 
    					   if ($agregado) { 						
    					       echo "<script>alert('Producto agregado');window.location = 'index.php?pid=".base64_encode("presentacion/producto/consultarProducto.php")."';</script>";
    				       }    
                        ?>    				       
    					<form
    						action="<?php echo "index.php?pid=" . base64_encode("presentacion/producto/comprarProducto.php")?>"
    						method="post">
    						<div class="form-group">
    							<input type="hidden" name="id_prod" class="form-control" value="<?php echo $producto -> getId_prod() ?>">
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="nombreP" class="form-control" value="<?php echo $producto -> getNombre() ?>">
    						</div>
    						<div class="form-group">
    							<input type="text" class="form-control" value="<?php echo $producto -> getNombre() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input type="text" class="form-control"
    								value="<?php echo $producto -> getDescripcion() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<table>    	
    								<tbody>					
    									<?php echo "<td><img src='" . $producto -> getImagen() . "' width='50px' /></td>";?>
    								</tbody>
    							</table>
    						</div>
    						<div class="form-group">
    							<input type="text" class="form-control"
    								value="<?php echo $producto -> getCantidad_und() ?>" disabled>
    						</div>
    						<div class="form-group">
    							<input name="cantidadU" type="hidden" class="form-control"
    								value="<?php echo $producto -> getCantidad_und() ?>">
    						</div>
    						<div class="form-group">
    							<input type="hidden" name="valor" class="form-control"
    								value="<?php echo $producto -> getValor() ?>" >
    						</div>
    						<div class="form-group">
    							<input type="text" class="form-control"
    								value="<?php echo $producto -> getValor() ?>" disabled>
    						</div>
    						<div class="form-group">
    								<input type="number" name="unidades" class="form-control"
    								placeholder="ingrese la cantidad de unidades" required="required">     
    						</div>     			    									
    						<div class="form-group">
    							<button type="submit" name="agregar" class="btn btn-primary">Agregar</button>
    						</div>
						</form>						
    				</div>
    			</div>
    		</div>
    	</div>
    </div>   
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>    