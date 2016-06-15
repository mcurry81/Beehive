<?php

?>
<!DOCTYPE html>

<html>
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<!--font awesome-->
<script src="https://use.fontawesome.com/93c8ead996.js"></script>

<link rel="stylesheet" href="../assets/css/jumbotron-narrow.css">
<link rel="stylesheet" href="../assets/css/beeStyle.css">
<link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light+Two' rel='stylesheet' type='text/css'>

<!--<script type="text/javascript" src="https://www.google.com/jsapi"></script>-->
<!--<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
</head>
<body>
  <div class="header" id="cdiv">
          <center>
            <a href="http://www.animatedimages.org/cat-bees-185.htm">
              <img src="http://www.animatedimages.org/data/media/185/animated-bee-image-0067.gif" border="0" alt="animated-bee-image-0067" id="beeGif">
            </a>
            <h1 style="font-family: Shadows Into Light Two, cursive;">
              <strong>Beehive Mite Tracking</strong>
            </h1>
          </center>
          <br>
          <a href="http://beetest.greenrivertech.net"><i class="fa fa-home" aria-hidden="true"><strong>Home</strong></i></a> <br>
  </div>
  <div class="container">

    <!--div for jumbotron with graphs/charts-->
    <div class="jumbotron">
        <h3 id="chartHeadline">Data Collection</h3>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <button id="change-chart">Change to Classic</button>
        <br><br>
        <div id="chart_div"></div>
      

      <br/>
   </div>



            <script type="text/javascript">
             google.charts.load('current', {'packages':['line', 'corechart']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var button = document.getElementById('change-chart');
      var chartDiv = document.getElementById('chart_div');

      var data = new google.visualization.DataTable();
      data.addColumn('date', 'Month');
      data.addColumn('number', "Mites Observed");
   

      data.addRows([
        [new Date(2016,1), 2],
             [new Date(2016,2), 80],
             [new Date(2016,3), 151]
      ]);

      var materialOptions = {
        chart: {
          title: 'Mites Reported in Hives'
        },
        width: 600,
        height: 400,
        series: {
          // Gives each series an axis name that matches the Y-axis below.
          0: {axis: 'Mites'},
         
        },
        axes: {
          // Adds labels to each axis; they don't have to match the axis names.
          y: {
            Mites: {label: 'Mite'},
          }
        }
      };

      var classicOptions = {
        title: 'Mites Reported',
        width: 600,
        height: 400,
        // Gives each series an axis that matches the vAxes number below.
        series: {
          0: {targetAxisIndex: 0}
       
        },
        vAxes: {
          // Adds titles to each axis.
          0: {title: 'Mites'}
        
        },
        hAxis: {
          ticks:[new Date(2016, 1), new Date(2016, 2), new Date(2016,3)
                 ]
        },
        vAxis: {
          viewWindow: {
            max: 30
          }
        }
      };

      function drawMaterialChart() {
        var materialChart = new google.charts.Line(chartDiv);
        materialChart.draw(data, materialOptions);
        button.innerText = 'Change to Classic';
        button.onclick = drawClassicChart;
      }

      function drawClassicChart() {
        var classicChart = new google.visualization.LineChart(chartDiv);
        classicChart.draw(data, classicOptions);
        button.innerText = 'Change to Material';
        button.onclick = drawMaterialChart;
      }

      drawMaterialChart();

    }

  </script>
</div><!--end container-->
<div class = "footer">
<!--Brand Logo -->

    <div class="row col-md-12 col-sm-12 text-center fblock">
      
       
      
        <ul class="list-inline">
          <li class ="icons"><a class="icons"href="?controller=mail&action=mail"><i class="fa fa-envelope-o fa-4x" aria-hidden="true"></i></li>
          <li class="icons"><a class="icons" href="https://www.facebook.com/GreenRiverHoneybees/?fref=ts" target="_blank" ><i class="fa fa-facebook-square fa-4x"></i></a>
        </ul>
        <h5><strong>Green River Honeybees &copy 2016</strong></h5>
    </div>
    
    <!--End of Brand Logo -->
   <!-- <div class="pull-right">
       <strong> Green River Honeybess &copy 2016</strong>
    </div>-->
    <div class="clearfix"></div>
</div>


    
         
    </body>   
</html>