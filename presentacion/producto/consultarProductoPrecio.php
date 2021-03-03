<?php
if($_SESSION["rol"] == "administrador"){
    $producto = new Producto();
    $productoPrecio = $producto -> productoPrecio();
    $datos = "['Producto', 'Valor'], ";
    foreach ($productoPrecio as $pp){
        $datos .= "['".$pp[0]."', ".$pp[1]."], ";
    }
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3>Estadisticas producto</h3>
                </div>
                <div class="card-body">
                    <div class="text-center" id="columnchartCantidad" style="width: 600px; height: 500px;"></div>
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
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

        var data = google.visualization.arrayToDataTable([
            <?php echo $datos?>
        ]);

        var options = {
            title : "Precio de productos"
        };
        var chart = new google.visualization.ColumnChart(document.getElementById('columnchartCantidad'));
        chart.draw(data, options);
    }
</script>
