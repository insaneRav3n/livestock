<?php
	include("include/db.php");
	if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 

    if(time()-$_SESSION["time"]>604800){
    session_destroy();
	header("Location: index.php");
    }
   
    $query = "SELECT bread, count(*) as number FROM cow WHERE status='Active' AND sold='0' GROUP BY bread ";  
    $result = mysqli_query($con, $query); 

    $query1 = "SELECT gender, count(*) as number FROM cow WHERE status='Active' AND sold='0' GROUP BY gender ";
    $result1 = mysqli_query($con, $query1);

    $query2 = "SELECT count(status) as number FROM cow Where status='Active' AND sold='0'";
    $result2= mysqli_query($con, $query2);
    
    $query3 = "SELECT count(pgstat) as number FROM cow WHERE pgstat='1'";
    $result3= mysqli_query($con, $query3);
?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Farm Management System</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <style>
    .container {
        width: 80%;
        margin: 0 auto;
        padding: 20px;
        background: #f0e68c;
    }
</style>
    <script type="text/javascript" src="assets/js/loader.js"></script>  
    <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Bread', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["bread"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Available Breeds',
                      fontSize: 15,  
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script> 

<script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart1);  
           function drawChart1()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row1 = mysqli_fetch_array($result1))  
                          {  
                               echo "['".$row1["gender"]."', ".$row1["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Gender Percentage', 
                      fontSize: 15, 
                      is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));  
                chart.draw(data, options);  
           }  
           </script> 


</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
	<?php
		include("include/menu.php");
	?>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

      <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-1">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div >
                   
                        <div class="dropdown for-message">
                          
                          <div class="dropdown-menu" aria-labelledby="message">
                           
                          </div>
                        </div>
                    </div>
                </div>

                <div >
                 

                </div>
            </div>
            <h4 align="center"><font size="+4" color="green "><b>Krishi Pragati</b></font></h4>
            <marquee >Made with &#10084; by <b>The TechWorks</b></marquee>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div>
                <div class="page-header">
                    <div >
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
        <div class="card-body">
            <?php $arr=mysqli_fetch_array($result2)?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    <b>  Active Animals :</b>
                <?=$arr["number"]?>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php $arr=mysqli_fetch_array($result3)?>
            <b>Pregnant Animals : </b><?=$arr["number"]?>

            </div>      </div>
                    
        <div class="content mt-3">

        <div  id="piechart" style="width:50%; height:500px; float: left;" class="card body"></div>
        <div  id="piechart1" style="width:50%; height:500px; float: right;" class="card body"></div>
        <footer>aaaa</footer>
            <!--/.col-->

         
            <!--/.col-->

          
            <!--/.col-->

         
            <!--/.col-->
			
            </div><!--/.col-->
            </div><!--/.col-->

            </div><!--/.col-->
            
        </div> <!-- .content -->
        
		</div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
    <script>
        ( function ( $ ) {
            "use strict";

            jQuery( '#vmap' ).vectorMap( {
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: [ '#1de9b6', '#03a9f5' ],
                normalizeFunction: 'polynomial'
            } );
        } )( jQuery );
    </script>

</body>
</html>
