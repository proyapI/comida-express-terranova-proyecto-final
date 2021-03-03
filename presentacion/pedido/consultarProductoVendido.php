<?php
if($_SESSION["rol"] == "administrador"){
    $pedido = new Pedido();
    $productoVendido = $pedido -> productoVendido();
    $datos = "['Producto', 'Cantidad'], ";
    foreach ($productoVendido as $pv){
        $datos .= "['".$pv[0]."', ".$pv[1]."], ";
    }
?>
<div class="container">
    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h3>Estadisticas pedidos</h3>
                </div>
                <div class="card-body">
                    <div class="text-center" id="piechartVenta" style="width: 600px; height: 500px;"></div>
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
            title : "Productos mas vendidos"
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechartVenta'));
        chart.draw(data, options);
    }
</script>
