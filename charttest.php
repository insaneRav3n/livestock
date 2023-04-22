<?php  
include("include/db.php");
 $query = "SELECT * FROM medical WHERE cow = 'G722' ";  
 $result = mysqli_query($con, $query);  
 ?>  
  

 <!DOCTYPE html>
<html>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<body>
<div id="myChart" style="width:100%; max-width:600px; height:500px;"></div>

<script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Date', 'Weight'],

  <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["date"]."', ".$row["weight"]."],";  
                          }  
                          ?>  
  


]);
// Set Options
var options = {
  title: 'Date vs. Weight',
  hAxis: {title: 'Date'},
  vAxis: {title: 'Weight'},  
  legend: 'none'
};
// Draw
var chart = new google.visualization.LineChart(document.getElementById('myChart'));
chart.draw(data, options);
}
</script>

</body>
</html>

