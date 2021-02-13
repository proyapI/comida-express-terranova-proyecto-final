<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
    $solicitado = false;
    if(isset($_POST["solicitar"])){
        $proveedor_existe = new Proveedor();
        if ($_POST["id"] == $proveedor_existe ->consultar_existe($_POST["id"])){
            echo "<script>alert('El id ingresado ya se encuentra registrado');</script>";
            $solicitado = false;
        }else{
            $solicitudp = new SolicitudP ( $_POST["id"], $_POST["nombre"],$_POST["correo"], $_POST["clave"]);
            $solicitudp -> crear();
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
    					<h3>Solicitud Proveedor</h3>
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
    						action=<?php echo "index.php?pid=" . base64_encode("presentacion/SolicitarP.php") ?>
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
    							<input type="text" name="correo" class="form-control"
    								placeholder="Correo" required="required">
    						</div>
    						<div class="form-group">
    							<input type="password" name="clave" class="form-control"
    								placeholder="Clave" required="required">
    						</div>
    						<div class="text-center">
    							<button onclick="location.href='<?php echo "index.php" ?>'" class="btn btn-primary"> Volver </button>
    							<button  type="submit" name="solicitar" class="btn btn-primary"> Solicitar </button>   							
    						</div>
    					</form>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    
