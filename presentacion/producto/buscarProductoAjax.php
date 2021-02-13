<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
if($_GET["rol"] == "administrador" || $_GET["rol"] == "cliente"){
    $filtro = $_GET["filtro"];
    $producto = new Producto();
    $productos = $producto -> buscar($filtro);
    ?>
    <div class="card">
    	<div class="card-header">
    		<h3>Resultados de Producto</h3>
    	</div>
    	<div class="card-body">
    		<table class="table table-striped table-hover table-responsive">
    			<thead>
    				<tr>
    					<th width="8%">#</th>
    					<th width="40%">Nombre</th>
    					<th width="40%">Descripcion</th>
    					<th width="8%">Imagen</th>
    					<th width="40%">Unidades</th>
    					<th width="40%">Valor</th>
    					<th>Servicios</th>
    				</tr>
    			</thead>
    			<tbody>
    			<?php 
    			foreach ($productos as $productoActual){
    			    $filtro = ucwords(strtolower($filtro));				  
    			    echo "<tr>";
    			    echo "<td>" . $productoActual -> getId_prod() . "</td><td>". str_replace($filtro, "<FONT color='#FF0000'>$filtro</FONT>", $productoActual -> getNombre()) ."</td>";
    			    echo "<td>" . $productoActual -> getDescripcion() . "</td><td>" . $productoActual -> getImagen() . "</td><td>" . $productoActual -> getCantidad_und() . "</td><td>". $productoActual -> getValor() . "</td>";
    			    echo "<td><a href='index.php?pid= " . base64_encode("presentacion/producto/editarProducto.php") . "&idProducto=" . $productoActual -> getId_prod() . "'><i class='fas fa-edit'></i></a></td>";
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