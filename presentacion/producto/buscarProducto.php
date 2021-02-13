<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
require "logica/Log.php";
if($_SESSION["rol"] == "administrador" || $_SESSION["rol"] == "cliente"){
    date_default_timezone_set('America/Bogota');
    if ($_SESSION["rol"] == "administrador"){
        $log = new Log($_SESSION["id"],"buscar","buscar producto" , date('Y-m-d'),date('H:i:s'),"administrador");
        $log -> crear();
    }
    elseif ($_SESSION["rol"] == "cliente"){
        $log = new Log($_SESSION["id"],"buscar","buscar producto", date('Y-m-d'),date('H:i:s'),"cliente");
        $log -> crear();
    }
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Buscar Producto</h3>
    				</div>
    				<div class="card-body">
    					<div class="form-group">
    						<input type="text" id="filtro" class="form-control"
    							placeholder="Filtro">
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    	<div class="row mt-3">
    		<div class="col">
    			<div id="resultados"></div>
    		</div>
    	</div>
    </div>
    <script>
    $(document).ready(function(){
    	$("#filtro").keyup(function(){
    		if($("#filtro").val().length > 0){
    			url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/producto/buscarProductoAjax.php") . "&rol=" . $_SESSION["rol"] ?>&filtro=" + $("#filtro").val();
    			$("#resultados").load(url);
    
    		}
    	});
    });
    </script>
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>    