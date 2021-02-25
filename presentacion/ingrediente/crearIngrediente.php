<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php  
require "logica/Log.php";
if($_SESSION["rol"] == "proveedor"){
    $creado = false;
    if(isset($_POST["crear"])){
        $ingrediente = new Ingrediente($_POST["id"], $_POST["nombre"], $_POST["cantidad_und"], $_SESSION["id"]);
        $ingrediente ->agregar();
        $creado = true;      
        date_default_timezone_set('America/Bogota');
        $log = new Log($_SESSION["id"],"crear","crear ingrediente: " . $_POST["nombre"] , date('Y-m-d'),date('H:i:s'),"proveedor");
        $log -> crear();
    }
    ?>
	<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Crear ingrediente</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($creado) { 					
    						echo "<script>window.location = 'index.php?pid=".base64_encode("presentacion/ingrediente/consultarIngrediente.php")."&id_prod=".$_POST["id"]."';</script>";
    					} ?>
    					<form
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/ingrediente/crearIngrediente.php") ?>
    						method="post">
    						<div class="form-group">
    							<input type="text" name="id" class="form-control"
    								placeholder="ID" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="nombre" class="form-control"
    								placeholder="Nombre" required="required">
    						</div>	
    						<div class="form-group">
    							<input type="number" name="cantidad_und" class="form-control"
    								placeholder="Cantidad_unidades" required="required">
    						</div>    						
    						<div class="form-group">
    							<button  type="submit" name="crear" class="btn btn-primary btn-block"> Crear</button>   							
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