<!DOCTYPE >
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<script src="<?php echo base_url('assets/js/jquery-1.9.1.min.js'); ?>"></script>
<script src="<?php echo base_url ('assets/js/highcharts.js'); ?>"></script>
<script type="text/javascript">
 
$(function () {
    $('#container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'HASIL VOTING PEMILIHAN PRESIDEN BEM UNS '

        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Hasil Voting ',
            data: [
                    <?php 
                    // data yang diambil dari database
                    if(count($graph)>0)
                    {
                       foreach ($graph as $data) {
                       echo "['".$data->id_hasil . "' ," . $data->jumlah ."],\n";
                       }
                    }
                    ?>
            ]
        }]
    });
});
 
</script>
</head>
<body>
 
<div id="container"></div>
 
</body>
</html>