<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php 
require "logica/Log.php";
if($_SESSION["rol"] == "administrador"){
    date_default_timezone_set('America/Bogota');
    $log = new Log($_SESSION["id"],"buscar","buscar domiciliario" , date('Y-m-d'),date('H:i:s'),"administrador");
    $log -> crear();
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
    			<div class="card">
    				<div class="card-header">
    					<h3>Buscar Domiciliario</h3>
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
    			url = "indexAjax.php?pid=<?php echo base64_encode("presentacion/domiciliario/buscarDomiciliarioAjax.php") . "&rol=" . $_SESSION["rol"] ?>&filtro=" + $("#filtro").val();
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