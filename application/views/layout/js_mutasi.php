<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

   var areaChartData1 = {
      labels: ['<?php echo $bulan?>'],
      datasets: [
        {
          label: "Penduduk Awal",
          fillColor: "rgb(12, 242, 0)",
          strokeColor: "rgb(12, 242, 0)",
          pointColor: "rgb(12, 242, 0)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgb(12, 242, 0)",
          data: [
          <?php 
            
              echo $jumlah_awal;
            
          ?>
          ]
        },
        
        {
          label: "Penduduk Lahir",
          fillColor: "rgba(0, 26, 23, 1)",
          strokeColor: "rgba(0, 26, 23, 1)",
          pointColor: "rgba(0, 26, 23, 1)",
          pointStrokeColor: "rgba(0, 26, 23, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(0, 26, 23, 1)",
          data: [
          <?php 
            
              echo $jumlah_lahir;
            
          ?>
          ]
        },
        {
          label: "Penduduk Mati",
          fillColor: "rgba(15, 43, 255, 1)",
          strokeColor: "rgba(15, 43, 255, 1)",
          pointColor: "rgba(15, 43, 255, 1)",
          pointStrokeColor: "rgba(15, 43, 255, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(15, 43, 255, 1)",
          data: [
          <?php 
            
              echo $jumlah_mati;
            
          ?>
          ]
        },
        {
          label: "Penduduk Datang",
          fillColor: "rgba(255, 15, 63, 1)",
          strokeColor: "rgba(255, 15, 63, 1)",
          pointColor: "rgba(255, 15, 63, 1)",
          pointStrokeColor: "rgba(255, 15, 63, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(255, 15, 63, 1)",
          data: [
          <?php 
            
              echo $jumlah_datang;
            
          ?>
          ]
        },
        {
          label: "Penduduk Pergi",
          fillColor: "rgba(160, 168, 0, 1)",
          strokeColor: "rgba(160, 168, 0, 1)",
          pointColor: "rgba(160, 168, 0, 1)",
          pointStrokeColor: "rgba(160, 168, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(160, 168, 0, 1)",
          data: [
          <?php 
            
              echo $jumlah_pergi;
            
          ?>
          ]
        },
        {
          label: "Penduduk Akhir",
          fillColor: "rgba(70,141,188,0.9)",
          strokeColor: "rgba(70,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(70,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(70,141,188,1)",
          data: [
          <?php 
            
              echo $jumlah_akhir;
            
          ?>
          ]
        
        }
    
      ]
    };

    

    //-------------
    //- BAR CHART1 -
    //-------------
    var barChartCanvas1 = $("#barChart1").get(0).getContext("2d");
    var barChart1 = new Chart(barChartCanvas1);
    var barChartData1 = areaChartData1;
    barChartData1.datasets[1].fillColor = "#00a65a";
    barChartData1.datasets[1].strokeColor = "#00a65a";
    barChartData1.datasets[1].pointColor = "#00a65a";
    var barChartOptions1 = {
      //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
      scaleBeginAtZero: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: true,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - If there is a stroke on each bar
      barShowStroke: true,
      //Number - Pixel width of the bar stroke
      barStrokeWidth: 2,
      //Number - Spacing between each of the X value sets
      barValueSpacing: 5,
      //Number - Spacing between data sets within X values
      barDatasetSpacing: 1,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to make the chart responsive
      responsive: true,
      maintainAspectRatio: true
    };

    barChartOptions1.datasetFill = false;
    barChart1.Bar(barChartData1, barChartOptions1);

    
   
  });
</script>