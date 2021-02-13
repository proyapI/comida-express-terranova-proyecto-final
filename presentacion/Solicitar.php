<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
    $solicitado = false;
    if(isset($_POST["solicitar"])){
        $domiciliario_existe = new Domiciliario();
        if ($_POST["id"] == $domiciliario_existe ->consultar_existe($_POST["id"])){
            echo "<script>alert('El id ingresado ya se encuentra registrado');</script>";
            $solicitado = false;
        }else{
            $solicitud = new Solicitud ($_POST["id"], $_POST["nombre"], $_POST["apellido"],$_POST["ciudad"],$_POST["localidad"],$_POST["direccion"], $_POST["telefono"],$_POST["correo"]);
            $solicitud -> crear();
            $solicitado = true;
        }
    }
?>
<div class="container">
    	<div class="row mt-3">
    		<div class="col-3"></div>
    		<div class="col-6"> 
    			<div class="card">
    				<div class="card-header">
    					<h3>Solicitud</h3>
    				</div>
    				<div class="card-body">
    					<?php if ($solicitado) { ?>						
    						<div class="alert alert-success alert-dismissible fade show"
    							role="alert">
    							<?php 
    							 echo "Datos solicitados"; 
    							 echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
    							?>
    						</div>
    					<?php } ?>
    					<form
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/Solicitar.php") ?>
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
    							<input type="text" name="apellido" class="form-control"
    								placeholder="Apellido" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="ciudad" class="form-control"
    								placeholder="Ciudad" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="localidad" class="form-control"
    								placeholder="Localidad" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="direccion" class="form-control"
    								placeholder="Direccion" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="telefono" class="form-control"
    								placeholder="Telefono" required="required">
    						</div>
    						<div class="form-group">
    							<input type="text" name="correo" class="form-control"
    								placeholder="Correo" required="required">
    						</div>    	    						
    						<div class="text-center">
    							<button onclick="location.href='<?php echo "index.php" ?>'" class="btn btn-primary"> Volver </button>
    							<button  type="submit" name="solicitar" class="btn btn-primary"> Registrar </button>   							
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
