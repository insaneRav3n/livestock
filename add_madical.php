<?php
	include("include/db.php");
		if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
	if(isset($_REQUEST["btnSave"])){
		$Query = "INSERT INTO medical
		(cow,desease,medicine,date,time,qty_unit,doctor,weight,vaccine)
		VALUES ('".$_REQUEST["Cow"]."',
		'".$_REQUEST["Desease"]."',
		'".$_REQUEST["Medicine"]."',
		'".$_REQUEST["Date"]."',
		'".$_REQUEST["Time"]."',
		'".$_REQUEST["QTY"]."',
		'".$_REQUEST["Doc"]."',
        '".$_REQUEST["weight"]."',
        '".$_REQUEST["Vaccine"]."')";

     if($_REQUEST["Vaccine"]=="yes"){
        $Query_1 = "UPDATE cow SET 
        c_weight = '".$_REQUEST["weight"]."',
        v_date = '".$_REQUEST["Date"]."'
        WHERE cow_tag_no = '".$_REQUEST["Cow"]."' ";

        $Query_2 = "INSERT INTO weight_log
		(tag_no,weight,date)
		VALUES ('".$_REQUEST["Cow"]."',
				'".$_REQUEST["weight"]."',
				'".$_REQUEST["Date"]."')";
     }
     else{
        $Query_1 = "UPDATE cow SET 
        c_weight = '".$_REQUEST["weight"]."'
        WHERE cow_tag_no = '".$_REQUEST["Cow"]."' ";   

        $Query_2 = "INSERT INTO weight_log
		(tag_no,weight,date)
		VALUES ('".$_REQUEST["Cow"]."',
				'".$_REQUEST["weight"]."',
				'".$_REQUEST["Date"]."')";
     }

        
		if(mysqli_query($con,$Query)== TRUE){
            mysqli_query($con,$Query_1);
            mysqli_query($con,$Query_2);
			header("Location: medical.php?Err=1");
		}
		else{
				header("Location: add_medical.php?Error=1");
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
    <link rel="stylesheet" href="assets/css/chosen.min.css">
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
            
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Add Medical</strong>
                        </div>
                        <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tag No.</label></div>
                            <div class="col-12 col-md-9">
							<select name="Cow" class="tag_list form-control">
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
							<small class="form-text text-muted">Select Tag No here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Desease</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Desease" placeholder="Desease" class="form-control"><small class="form-text text-muted">Enter Desease here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Medicine</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Medicine" placeholder="Medicine" class="form-control"><small class="form-text text-muted">Enter Medicine here</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Vaccine</label></div>
                            <div class="col-12 col-md-9">
							<select name="Vaccine" class="form-control">
								
									<option value="yes">Yes</option>
                                    <option value="no">No</option>
								
							</select>
							</div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Weight</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="weight" class="form-control"><small class="form-text text-muted">Select Date here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Date" class="form-control"><small class="form-text text-muted">Select Date here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Time</label></div>
                            <div class="col-12 col-md-9"><input type="time" name="Time" placeholder="Time" class="form-control"><small class="form-text text-muted">Enter Time here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Quantity Unit</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="QTY" placeholder="Quantity Unit" class="form-control"><small class="form-text text-muted">Enter Quantity Unit here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Doctor</label></div>
                            <div class="col-12 col-md-9">
							<select name="Doc" class="form-control">
								<?php
									$Query2="SELECT * FROM doctor";
									$rst2=mysqli_query($con,$Query2);
									while($arr2=mysqli_fetch_array($rst2)){
								?>
								<option value="<?=$arr2["doctor_name"]?>" ><?=$arr2["doctor_name"]?></option>
								<?php
								}
								?>
							</select>
							<small class="form-text text-muted">Select Doctor here</small></div>
                          </div>
						   <div class="row form-group">
                            <div class="col-12 col-md-9"><input type="submit" name="btnSave" class="btn btn-primary btn-lg" style="margin-left:50%;" value="Save"></div>
                          </div>
						  </form>
                       </div>
                    </div>
                </div>


                </div>
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
    <script src="assets/js/chosen.jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
<script>
    jQuery('.tag_list').chosen();
</script>

</body>
</html>
