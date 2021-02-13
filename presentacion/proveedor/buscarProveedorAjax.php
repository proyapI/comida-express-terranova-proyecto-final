<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if($_GET["rol"] == "administrador"){
    $filtro = $_GET["filtro"];
    $proveedor = new Proveedor();
    $proveedores = $proveedor -> buscar($filtro);
    ?>
    <div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6">
                <div class="card">
                	<div class="card-header">
                		<h3>Resultados de Proveedor</h3>
                	</div>
                	<div class="card-body">
                		<table class="table table-striped table-hover table-responsive">
                			<thead>
                				<tr>
                					<th width="8%">#</th>
                					<th width="40%">Nombre</th>    					
                					<th width="40%">Imagen</th>
                					<th width="40%">Correo</th>
                				</tr>
                			</thead>
                			<tbody>
                			<?php 
                			foreach ($proveedores as $proveedorActual){
                			    $filtro = ucwords(strtolower($filtro));				  
                			    echo "<tr>";
                			    echo "<td>" . $proveedorActual -> getId() . "</td><td>". str_replace($filtro, "<FONT color='#FF0000'>$filtro</FONT>", $proveedorActual -> getNombre() ."</td><td>" . $proveedorActual -> getImagen()) . "</td>";
                			    echo "<td>" . $proveedorActual -> getCorreo() . "</td>";    			        			    
                			    echo "</tr>";			
                			}			
                			?>
                			</tbody>
                		</table>
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