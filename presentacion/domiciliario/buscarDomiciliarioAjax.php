<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if($_GET["rol"] == "administrador"){
    $filtro = $_GET["filtro"];
    $domiciliario = new Domiciliario();
    $domiciliarios = $domiciliario -> buscar($filtro);
    ?>
    <div class="card">
    	<div class="card-header">
    		<h3>Resultados de Domiciliario</h3>
    	</div>
    	<div class="card-body">
    		<table class="table table-striped table-hover table-responsive">
    			<thead>
    				<tr>
    					<th width="8%">#</th>
    					<th width="40%">Nombre</th>
    					<th width="40%">Apellido</th>
    					<th width="40%">Ciudad</th>
    					<th width="40%">Localidad</th>
    					<th width="8%">Direccion</th>
    					<th width="40%">Telefono</th>
    					<th width="40%">Imagen</th>
    					<th width="40%">Correo</th>
    					<th width="40%">Estado</th>
    					<th>Servicios</th>
    				</tr>
    			</thead>
    			<tbody>
    			<?php 
    			foreach ($domiciliarios as $domiciliarioActual){
    			    $filtro = ucwords(strtolower($filtro));				  
    			    echo "<tr>";
    			    echo "<td>" . $domiciliarioActual -> getIdDomiciliario() . "</td><td>". str_replace($filtro, "<FONT color='#FF0000'>$filtro</FONT>", $domiciliarioActual -> getNombre() ."</td><td>" . $domiciliarioActual -> getApellido()) . "</td>";
    			    echo "<td>" . $domiciliarioActual -> getCiudad() . "</td><td>" . $domiciliarioActual -> getLocalidad() . "</td><td>" . $domiciliarioActual -> getDireccion() . "</td><td>". $domiciliarioActual -> getTelefono() . "</td>";
    			    echo "<td>" . $domiciliarioActual -> getImagen() . "</td><td>" . $domiciliarioActual -> getCorreo() . "</td><td>" . $domiciliarioActual -> getEstado() . "</td>";
    			    echo "<td><a href='index.php?pid= " . base64_encode("presentacion/domiciliario/editarDomiciliario.php") . "&idProducto=" . $domiciliarioActual -> getIdDomiciliario() . "'><i class='fas fa-edit'></i></a></td>";
    			    echo "</tr>";			
    			}			
    			?>
    			</tbody>
    		</table>
    	</div>
    </div>
<?php 
} else {
    echo "Lo siento. Usted no tiene permisos";
}
?>        