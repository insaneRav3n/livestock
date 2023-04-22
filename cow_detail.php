<?php
	include("include/db.php");
		if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
    $id=$_GET["ID"];
    $id1=$_GET["ID1"];
    if(isset($_REQUEST["btnSave"])){
       $Query="UPDATE cow SET 
        status = 'Active'
        WHERE cow_tag_no = '".$id1."' ";
    if(mysqli_query($con,$Query)== TRUE){
             header("Location: cows.php?Err=1");
        }else{
                header("Location: cows.php?Error=1");
       }
    }
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
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <script type="text/javascript" src="assets/js/loader.js"></script>
    

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

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                   
                        <div class="dropdown for-message">
                          
                          <div class="dropdown-menu" aria-labelledby="message">
                           
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                  
                    <div class="language-select dropdown" id="language-select">
                       
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
            <div class="animated fadeIn">
        
        <div class="row">
			    <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Animal Detail</strong>
                       </div>
                        <div class="card-body">
                        <div id="myChart" style="width:100%; height:500px;"></div>
                     <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <tbody>
					<?php
							$Query1="SELECT * FROM cow WHERE cow_id='".$id."'";
							$rst=mysqli_query($con,$Query1);
							while($arr=mysqli_fetch_array($rst)){
					?>
						<tr>
							<th>ID</th>
							<td><?=$arr["cow_id"]?></td>
						</tr>
						<tr>                 
							<th>Tag No</th>
							<td><?=$arr["cow_tag_no"]?></td>
						</tr>
						<tr>                 
							<th>Name</th>
                          <td><?=$arr["cow_name"]?></td>
						</tr>
						<tr>                 
							<th>Color</th>         
						  <td><?=$arr["color"]?></td>
						</tr>
                        <tr>                 
							<th>Horn</th>         
						  <td><?=$arr["horn"]?></td>
						</tr>
						<tr>                 
							<th>Breed</th>
                            <td><?=$arr["bread"]?></td>
						</tr>
						<tr>                 
							<th>Age</th>
							<td><?=$arr["age"]?></td>
                        </tr>
						
						<tr>                 
							<th>Current Weight</th>
							<td><?=$arr["c_weight"]?></td>
						</tr>
						<tr>                 
							<th>Gender</th>
							<td><?=$arr["gender"]?></td>
						</tr>
						<tr>                 
							<th>Image</th>
							<td><img src="<?=$arr["cow_image"]?>" width="50px" height="50px"></td>
						</tr>	
                        <tr>                 
							<th>Last Vaccine Date</th>                  
							<td><?=$arr["v_date"]?></td>
						</tr>
                        <tr>                 
							<th>Father</th>                  
							<td><?=$arr["ftag"]?></td>
						</tr>

                        <tr>                 
							<th>Mother</th>                  
							<td><?=$arr["mtag"]?></td>
						</tr>
                        <tr>                 
							<th>Purchase / Entry Date</th>                  
							<td><?=$arr["pur_d"]?></td>
						</tr>
						<tr>                 
							<th>Status</th>                  
							<td><?=$arr["status"]?></td>
						</tr>
                        <tr>
                          <th> 
                          <form method="post">
                            <input type="submit" name="btnSave" value="Revert Status" />
                          </form>
                          </th>
                          <td></td> 

                        </tr>




						<?php
							}
						?>
                    </tbody>
                    
                  </table>
                  
                     </div>
                    </div>
                </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->
    <script>
google.charts.load('current',{packages:['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
// Set Data
var data = google.visualization.arrayToDataTable([
  ['Date', 'Weight'],

  <?php  
      $query = "SELECT * FROM weight_log WHERE tag_no = '".$id1."' ORDER BY date ASC ";  
      $result = mysqli_query($con, $query);

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

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>
