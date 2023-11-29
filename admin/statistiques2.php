<?php 
  session_start();
  include "../connexion.php";
  if (isset($_SESSION['login'])) {
    if ($_SESSION['type']!="admin") {
      header("location:../403.php");
    }
  }else {
    header("location:../login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>État de la base</title>
 <style>
     body{
        display: flex;
        justify-content: flex-end;
     }
     .highcharts-background{
         fill: #e4e9f7;
     }
     .highcharts-credits{
          display: none;
        }
 </style>
 </head>
 <body>
 <!-- 1. Add JQuery and Highcharts in the head of your page -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
          
        <!-- 2. You can add print and export feature by adding this line -->
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
 <script type="text/javascript">
  jQuery(document).ready(function() { 
 Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Les etudiants valider pour passer la soutenance'
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
        name: 'Les etudiants valider pour passer la soutenance',
        colorByPoint: true,
        data: [{
            name: 'Valider',
            <?php 
                $sql = "SELECT count(*) from etudiant where valider = 'oui'";
                $result = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($result);
               ?>
               y: <?php echo $data[0] ?>.00
           }, {
               name: 'Non valider',
               <?php 
                $sql1 = "SELECT count(*) from etudiant where valider = 'non'";
                $result1 = mysqli_query($conn, $sql1);
                $data1 = mysqli_fetch_array($result1);
                ?>
               y: <?php echo $data1[0] ?>.00
        
        }]
    }]
});
 });
 </script>
  <!-- 3. Add the container -->
  <div id="container1" style="width:50%; height:100%;"></div>    
 </body>
</html>