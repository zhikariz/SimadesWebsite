<script>
  $(function () {
      
    /*
     * BAR CHART Pekerjaan
     * ---------
     */

    var bar_data_pekerjaan = {
      data: [
                    <?php 
                    // data yang diambil dari database
                      if(count($data_pekerjaan)>0)
                      {
                         foreach ($data_pekerjaan as $row) {
                          echo "['".$row->label . "' ," . $row->jumlah ."],\n";
                         }
                      }
                    ?>
            ],
      color: "green"
    };
    $.plot("#bar-chart-kerja", [bar_data_pekerjaan], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
    /* END BAR CHART Pekerjaan*/

    

    /*
     * BAR CHART UMUR
     * ---------
     */

    var bar_data_umur = {
      data: [ ['Balita (0-5)', <?php echo $balita?> ], [ 'Anak (6-11)', <?php echo $anak?> ], [ 'Remaja (12-16)', <?php echo $remaja?> ], [ 'Dewasa (17-45)', <?php echo $dewasa?> ], [ 'Lansia (46-65)', <?php echo $lansia?> ], [ 'Manula (>65)', <?php echo $manula?> ]               
            ],
      color: "grey"
    };
    $.plot("#bar-chart-umur", [bar_data_umur], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
    /* END BAR CHART UMUR*/

    /*
     * BAR CHART Pendidikan
     * ---------
     */

    var bar_data_pendidikan = {
      data: [
                    <?php 
                    // data yang diambil dari database
                      if(count($data_pendidikan)>0)
                      {
                         foreach ($data_pendidikan as $row) {
                          echo "['".$row->label . "' ," . $row->jumlah ."],\n";
                         }
                      }
                    ?>
            ],
      color: "#3c8dbc"
    };
    $.plot("#bar-chart-pendidikan", [bar_data_pendidikan], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
    /* END BAR CHART Pendidikan*/

    /*
     * BAR CHART Hubkel
     * ---------
     */

    var bar_data_hubkel = {
      data: [
                    <?php 
                    // data yang diambil dari database
                      if(count($data_hubkel)>0)
                      {
                         foreach ($data_hubkel as $row) {
                          echo "['".$row->label . "' ," . $row->jumlah ."],\n";
                         }
                      }
                    ?>
            ],
      color: "red"
    };
    $.plot("#bar-chart-hubkel", [bar_data_hubkel], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
    /* END BAR CHAR Hubkel*/

  //-------------
  //- PIE CHART Jekel-
  //-------------
  // Get context with jQuery - using jQuery's .get() method
  var pieChartCanvas2 = $("#pieChartJekel").get(0).getContext("2d");
  var pieChart2 = new Chart(pieChartCanvas2);
  var PieData2 = [
    {
      value: <?php echo $laki; ?>,
      color: "#f56954",
      highlight: "#f56954",
      label: "Laki-laki"
    },
    
    {
      value: <?php echo $perempuan; ?>,
      color: "#00c0ef",
      highlight: "#00c0ef",
      label: "Perempuan"
    }
    
  ];
  var pieOptions2 = {
    //Boolean - Whether we should show a stroke on each segment
    segmentShowStroke: true,
    //String - The colour of each segment stroke
    segmentStrokeColor: "#fff",
    //Number - The width of each segment stroke
    segmentStrokeWidth: 1,
    //Number - The percentage of the chart that we cut out of the middle
    percentageInnerCutout: 50, // This is 0 for Pie charts
    //Number - Amount of animation steps
    animationSteps: 100,
    //String - Animation easing effect
    animationEasing: "easeOutBounce",
    //Boolean - Whether we animate the rotation of the Doughnut
    animateRotate: true,
    //Boolean - Whether we animate scaling the Doughnut from the centre
    animateScale: false,
    //Boolean - whether to make the chart responsive to window resizing
    responsive: true,
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio: false,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>",
    //String - A tooltip template
    tooltipTemplate: "<%=label%> Jumlah = <%=value %>"
  };
  //Create pie or douhnut chart
  // You can switch between pie and douhnut using the method below.
  pieChart2.Doughnut(PieData2, pieOptions2);
  //-----------------
  //- END PIE CHART -
  //-----------------

    

  });

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + "<br>"
        + Math.round(series.percent) + "%</div>";
  }
</script>