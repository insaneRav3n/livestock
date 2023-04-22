<?php
	include("include/db.php");
	if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
	if(isset($_REQUEST["btnSave"])){
		$Query = "UPDATE medical SET
		cow = '".$_REQUEST["Cow"]."',
		desease = '".$_REQUEST["Desease"]."',
		medicine = '".$_REQUEST["Medicine"]."',
        weight = '".$_REQUEST["Weight"]."',
		date = '".$_REQUEST["Date"]."',
		time = '".$_REQUEST["Time"]."',
		qty_unit= '".$_REQUEST["QTY"]."',
		doctor = '".$_REQUEST["Doc"]."' 
		WHERE medical_id = '".$_REQUEST["ID"]."' ";
		if(mysqli_query($con,$Query)== TRUE){
			header("Location: medical.php?Err=3");
		}
		else{
				header("Location: edit_medical.php?Error=1");
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
                            <strong class="card-title">Edit Medical</strong>
                        </div>
                        <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         <?php
							$Query2="SELECT * FROM medical WHERE medical_id = '".$_REQUEST["ID"]."' ";
							$rst2=mysqli_query($con,$Query2);
							$arr2=mysqli_fetch_array($rst2);
					?>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cow</label></div>
                            <div class="col-12 col-md-9">
							<select name="Cow" class="form-control">
								<option value="<?=$arr2["cow"]?>" ><?=$arr2["cow"]?></option>
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
							<small class="form-text text-muted">Select Cow here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Desease</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Desease" value="<?=$arr2["desease"]?>" placeholder="Desease" class="form-control"><small class="form-text text-muted">Enter Desease here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Medicine</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Medicine" value="<?=$arr2["medicine"]?>" placeholder="Medicine" class="form-control"><small class="form-text text-muted">Enter Medicine here</small></div>
                          </div>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Weight (in KG.)</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Weight" value="<?=$arr2["weight"]?>" placeholder="Weight" class="form-control"><small class="form-text text-muted">Enter Correct Weight here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Date" value="<?=$arr2["date"]?>" class="form-control"><small class="form-text text-muted">Select Date here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Time</label></div>
                            <div class="col-12 col-md-9"><input type="time" name="Time" value="<?=$arr2["time"]?>" placeholder="Time" class="form-control"><small class="form-text text-muted">Enter Time here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Quantity Unit</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="QTY" value="<?=$arr2["qty_unit"]?>" placeholder="Quantity Unit" class="form-control"><small class="form-text text-muted">Enter Quantity Unit here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Doctor</label></div>
                            <div class="col-12 col-md-9">
							<select name="Doc" class="form-control">
								<option value="<?=$arr2["doctor"]?>" > <?=$arr2["doctor"]?> </option>
								<?php
									$Query3="SELECT * FROM doctor";
									$rst3=mysqli_query($con,$Query3);
									while($arr3=mysqli_fetch_array($rst3)){
								?>
								<option value="<?=$arr3["doctor_name"]?>" ><?=$arr3["doctor_name"]?></option>
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


    <script type="text/javascript">
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
        } );
    </script>


</body>
</html>