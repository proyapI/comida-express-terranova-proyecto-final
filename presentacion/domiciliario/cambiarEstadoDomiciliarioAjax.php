<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php
$idDomiciliario = $_GET["idDomiciliario"];
$domiciliario = new Domiciliario($idDomiciliario);
$domiciliario -> consultar();
date_default_timezone_set('America/Bogota');
if($domiciliario -> getEstado() == 1){
    $domiciliario -> cambiarEstado(0);
    echo "<i class='fas fa-times-circle' data-toggle='tooltip' data-placement='bottom' title='Deshabilitado'></i>";
    $log = new Log($idDomiciliario,"cambiar/deshabilitar","cambiar estado domiciliario: " . $_GET["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
    $log -> crear();
}else{
    $domiciliario -> cambiarEstado(1);
    echo "<i class='fas fa-check-circle' data-toggle='tooltip' data-placement='bottom' title='Habilitado'></i>";
    $log = new Log($idDomiciliario,"cambiar/habilitar","cambiar estado domiciliario: " . $_GET["nombre"] , date('Y-m-d'),date('H:i:s'),"administrador");
    $log -> crear();
}
?>    

