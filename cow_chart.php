<?php
	include("include/db.php");
		if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
		if(isset($_REQUEST["btnSave"])){
			$Query = "INSERT INTO lectation
			(lectation_cow, lectation_name, lectation_date_from, lectation_date_to)
			VALUES ('".$_REQUEST["Cow_Name"]."',
					'".$_REQUEST["Lectation"]."',
					'".$_REQUEST["Date_From"]."',
					'".$_REQUEST["Date_To"]."')";
					mysqli_query($con,$Query);
			
			$Query1 = "INSERT INTO food_plan
			(food_cow, feed,food_qty,food_time)
			VALUES ('".$_REQUEST["Cow_Name"]."',
					'".$_REQUEST["Feed"]."',
					'".$_REQUEST["Qty"]."',
					'".$_REQUEST["Feed_Time"]."')";
					mysqli_query($con,$Query1);
			
			$Query2 = "INSERT INTO pregnancy
			(pregnancy_cow, pregnancy_date_from,pregnancy_date_to)
			VALUES ('".$_REQUEST["Cow_Name"]."',
					'".$_REQUEST["Pregnancy_From"]."',
					'".$_REQUEST["Pregnancy_To"]."')";
					mysqli_query($con,$Query2);
					
			$Query3 = "INSERT INTO medicine
			(medicine_cow, medicine_name, medicine_time, medicine_qty)
			VALUES ('".$_REQUEST["Cow_Name"]."',
					'".$_REQUEST["Medicine_Name"]."',
					'".$_REQUEST["Medicine_Time"]."',
					'".$_REQUEST["Medicine_Qty"]."')";
					mysqli_query($con,$Query3);

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
                <form name="Form" method="post">
				<div class="row">
					<?php
				if(isset($_REQUEST["Error"]))
				{
					if($_REQUEST["Error"] == 1)
						$Error = "Query is not excuted !";
			?>
			  <div class="col-sm-12">
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                 <?=$Error;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
			<?php
				}
			?>
					<div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Cow Chart</strong>
                        </div>
                        <div class="card-body">
                          <div class="row form-group">
						  
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cow Tag No</label></div>
                            <div class="col-12 col-md-9">
							<select name="Cow_Name" class="form-control">
								<?php
									$Query1="SELECT * FROM cow";
									$rst=mysqli_query($con,$Query1);
									while($arr=mysqli_fetch_array($rst)){
								?>
								<option value="<?=$arr["cow_tag_no"]?>" ><?=$arr["cow_tag_no"]?></option>
								<?php
								}
								?>
							</select>
								<small class="form-text text-muted">Select Cow here</small>
							</div>
                          </div>
				       </div>
                    </div>
                </div>
</div>
				<div class="row">
					<div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Lectation Chart</strong>
                        </div>
                        <div class="card-body">
                          <div class="row form-group">
						  
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Lectation Period</label></div>
                            <div class="col-12 col-md-9">
							<select name="Lectation" class="form-control">
								<option value="early" >Early</option>
								<option value="normal" >Normal</option>
								<option value="late" >Late</option>
							</select>
								<small class="form-text text-muted">Select Lectation Period here</small>
							</div>
							
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date From</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Date_From" class="form-control"><small class="form-text text-muted">Select Date here</small></div>
                          
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date To</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Date_To" class="form-control"><small class="form-text text-muted">Select Date here</small></div>
                          </div>
				       </div>
                    </div>
                </div>

    <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Food Chart</strong>
                        </div>
                        <div class="card-body">
                         
                          <div class="row form-group">
							<div class="col col-md-3"><label for="text-input" class=" form-control-label">Select Feed</label></div>
                            <div class="col-12 col-md-9">
							<select name="Feed" class="form-control">
								<?php
									$Query3="SELECT * FROM breads";
									$rst3=mysqli_query($con,$Query3);
									while($arr3=mysqli_fetch_array($rst3)){
								?>
								<option value="<?=$arr3["bread_name"]?>" ><?=$arr3["bread_name"]?></option>
								<?php
								}
								?>
							</select>
								<small class="form-text text-muted">Select Feed here</small>
							</div>
							
							<div class="col col-md-3"><label for="text-input" class=" form-control-label">Feed Quantity</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Qty" placeholder="Feed Quantity" class="form-control"><small class="form-text text-muted">Enter Feed Quantity here</small></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Time</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Feed_Time" class="form-control"><small class="form-text text-muted">Enter Time here</small></div>
							</div>
						</div>
                    </div>
                </div>
                </div>
				<div class="row">

                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Pregnancy Chart</strong>
                        </div>
                        <div class="card-body">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date From</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Pregnancy_From" class="form-control"><small class="form-text text-muted">Select Date here</small></div>
                           <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date To</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Pregnancy_To" class="form-control"><small class="form-text text-muted">Select Date here</small></div>
                          </div>
				       </div>
                    </div>
                </div>

    <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Medical Chart</strong>
                        </div>
                        <div class="card-body">
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Medicine Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Medicine_Name" placeholder="Medicine Name" class="form-control"><small class="form-text text-muted">Enter Medicine Name here</small></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Medicine Quantity</label></div>
                            <div class="col-12 col-md-9"><input type="text"  name="Medicine_Qty" placeholder="Medicine Quantity" class="form-control"><small class="form-text text-muted">Enter Medicine Name here</small></div>
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Medicine Time</label></div>
                            <div class="col-12 col-md-9"><input type="time" name="Medicine_Time" class="form-control"><small class="form-text text-muted">Enter Medicine Time here</small></div>
                          </div>
				       </div>
                    </div>
                </div>
                </div>
				
				<div class="row">

    <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                		  <div class="row form-group">
                            <div class="col-12 col-md-9"><input type="submit" name="btnSave" class="btn btn-primary btn-lg" style="margin-left:50%;" value="Save"></div>
                          </div>
				       </div>
                    </div>
                </div>
                </div>
				
				</form>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


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
