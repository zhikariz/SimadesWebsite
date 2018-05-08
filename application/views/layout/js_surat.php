<script>
  $(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */



    var areaChartData1 = {
      labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni"],
      datasets: [
        {
          label: "Surat Keterangan Kelahiran",
          fillColor: "rgba(110, 20, 148, 1)",
          strokeColor: "rgba(110, 20, 148, 1)",
          pointColor: "rgba(110, 20, 148, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(110, 20, 148, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $lahir[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Usaha",
          fillColor: "rgba(168, 0, 0, 1)",
          strokeColor: "rgba(168, 0, 0, 1)",
          pointColor: "rgba(168, 0, 0, 1)",
          pointStrokeColor: "rgba(168, 0, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(168, 0, 0, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $usaha[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Penduduk Meninggal",
          fillColor: "rgba(15, 43, 255, 1)",
          strokeColor: "rgba(15, 43, 255, 1)",
          pointColor: "rgba(15, 43, 255, 1)",
          pointStrokeColor: "rgba(15, 43, 255, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(15, 43, 255, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $meninggal[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Pengantar SKCK",
          fillColor: "rgba(255, 15, 63, 1)",
          strokeColor: "rgba(255, 15, 63, 1)",
          pointColor: "rgba(255, 15, 63, 1)",
          pointStrokeColor: "rgba(255, 15, 63, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(255, 15, 63, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $skck[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Wali",
          fillColor: "rgba(70,141,188,0.9)",
          strokeColor: "rgba(70,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(70,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(70,141,188,1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $wali[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Belum Pernah Menikah",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $nikah[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Izin Keramaian",
          fillColor: "rgba(15, 255, 227, 1)",
          strokeColor: "rgba(15, 255, 227, 1)",
          pointColor: "rgba(15, 255, 227, 1)",
          pointStrokeColor: "rgba(15, 255, 227, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(15, 255, 227, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $ramai[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Bepergian",
          fillColor: "rgba(0, 26, 23, 1)",
          strokeColor: "rgba(0, 26, 23, 1)",
          pointColor: "rgba(0, 26, 23, 1)",
          pointStrokeColor: "rgba(0, 26, 23, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(0, 26, 23, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $pergi[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Kehilangan",
          fillColor: "rgba(168, 0, 0, 1)",
          strokeColor: "rgba(168, 0, 0, 1)",
          pointColor: "rgba(168, 0, 0, 1)",
          pointStrokeColor: "rgba(168, 0, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(168, 0, 0, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $hilang[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Tidak Mampu",
          fillColor: "rgba(160, 168, 0, 1)",
          strokeColor: "rgba(160, 168, 0, 1)",
          pointColor: "rgba(160, 168, 0, 1)",
          pointStrokeColor: "rgba(160, 168, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(160, 168, 0, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $mampu[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Pengantar E-KTP",
          fillColor: "rgba(160, 168, 0, 1)",
          strokeColor: "rgba(160, 168, 0, 1)",
          pointColor: "rgba(160, 168, 0, 1)",
          pointStrokeColor: "rgba(160, 168, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(160, 168, 0, 1)",
          data: [
          <?php
            for ($i=1; $i <= 6 ; $i++) {
              echo $mampu[$i].', ';
            }
          ?>
          ]
        }

      ]
    };

    var areaChartData2 = {
      labels: ["Juli", "Agustus", "September", "Oktober", "November", "Desember"],
      datasets: [
        {
          label: "Surat Keterangan Kelahiran",
          fillColor: "rgba(110, 20, 148, 1)",
          strokeColor: "rgba(110, 20, 148, 1)",
          pointColor: "rgba(110, 20, 148, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(110, 20, 148, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $lahir[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Usaha",
          fillColor: "rgba(168, 0, 0, 1)",
          strokeColor: "rgba(168, 0, 0, 1)",
          pointColor: "rgba(168, 0, 0, 1)",
          pointStrokeColor: "rgba(168, 0, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(168, 0, 0, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $usaha[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Penduduk Meninggal",
          fillColor: "rgba(15, 43, 255, 1)",
          strokeColor: "rgba(15, 43, 255, 1)",
          pointColor: "rgba(15, 43, 255, 1)",
          pointStrokeColor: "rgba(15, 43, 255, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(15, 43, 255, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $meninggal[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Pengantar SKCK",
          fillColor: "rgba(255, 15, 63, 1)",
          strokeColor: "rgba(255, 15, 63, 1)",
          pointColor: "rgba(255, 15, 63, 1)",
          pointStrokeColor: "rgba(255, 15, 63, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(255, 15, 63, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $skck[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Wali",
          fillColor: "rgba(70,141,188,0.9)",
          strokeColor: "rgba(70,141,188,0.8)",
          pointColor: "#3b8bba",
          pointStrokeColor: "rgba(70,141,188,1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(70,141,188,1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $wali[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Belum Pernah Menikah",
          fillColor: "rgba(210, 214, 222, 1)",
          strokeColor: "rgba(210, 214, 222, 1)",
          pointColor: "rgba(210, 214, 222, 1)",
          pointStrokeColor: "#c1c7d1",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(220,220,220,1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $nikah[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Izin Keramaian",
          fillColor: "rgba(15, 255, 227, 1)",
          strokeColor: "rgba(15, 255, 227, 1)",
          pointColor: "rgba(15, 255, 227, 1)",
          pointStrokeColor: "rgba(15, 255, 227, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(15, 255, 227, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $ramai[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Bepergian",
          fillColor: "rgba(0, 26, 23, 1)",
          strokeColor: "rgba(0, 26, 23, 1)",
          pointColor: "rgba(0, 26, 23, 1)",
          pointStrokeColor: "rgba(0, 26, 23, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(0, 26, 23, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $pergi[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Kehilangan",
          fillColor: "rgba(168, 0, 0, 1)",
          strokeColor: "rgba(168, 0, 0, 1)",
          pointColor: "rgba(168, 0, 0, 1)",
          pointStrokeColor: "rgba(168, 0, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(168, 0, 0, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $hilang[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Tidak Mampu",
          fillColor: "rgba(160, 168, 0, 1)",
          strokeColor: "rgba(160, 168, 0, 1)",
          pointColor: "rgba(160, 168, 0, 1)",
          pointStrokeColor: "rgba(160, 168, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(160, 168, 0, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $mampu[$i].', ';
            }
          ?>
          ]
        },
        {
          label: "Surat Keterangan Pengantar E-KTP",
          fillColor: "rgba(160, 168, 0, 1)",
          strokeColor: "rgba(160, 168, 0, 1)",
          pointColor: "rgba(160, 168, 0, 1)",
          pointStrokeColor: "rgba(160, 168, 0, 1)",
          pointHighlightFill: "#fff",
          pointHighlightStroke: "rgba(160, 168, 0, 1)",
          data: [
          <?php
            for ($i=7; $i <= 12 ; $i++) {
              echo $ektp[$i].', ';
            }
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

    //-------------
    //- BAR CHART2 -
    //-------------
    var barChartCanvas2 = $("#barChart2").get(0).getContext("2d");
    var barChart2 = new Chart(barChartCanvas2);
    var barChartData2 = areaChartData2;
    barChartData2.datasets[1].fillColor = "#00a65a";
    barChartData2.datasets[1].strokeColor = "#00a65a";
    barChartData2.datasets[1].pointColor = "#00a65a";
    var barChartOptions2 = {
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

    barChartOptions2.datasetFill = false;
    barChart2.Bar(barChartData2, barChartOptions2);
  });
</script>
