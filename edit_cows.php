<?php
include("include/db.php");
	if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
    $ddd=1;
	if(isset($_REQUEST["btnSave"])){
		$target_dir = "images/Product Images/";
		$target_file = $target_dir.$_FILES["Image"]["name"];
		move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);
		$Query = "UPDATE cow SET
		cow_tag_no = '".$_REQUEST["Tag_No"]."',		
		color = '".$_REQUEST["Color"]."',
        horn = '".$_REQUEST["Horn"]."',
		bread = '".$_REQUEST["Bread"]."',
		age = '".$_REQUEST["Age"]."',		
		weight = '".$_REQUEST["Weight"]."',
		gender = '".$_REQUEST["Gender"]."',
		cow_image = '".$target_file."',
		cat_id = '".$ddd."',
		product_type_id = '".$ddd."',
        dod = '".$_REQUEST["Date"]."',
		status = '".$_REQUEST["Status"]."' 
		WHERE cow_id = '".$_REQUEST["ID"]."' ";
		if(mysqli_query($con,$Query)== TRUE){
			header("Location: cows.php?Err=3");
		}
		else{
				header("Location: edit_cows.php?Error=1");
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
                            <strong class="card-title">Edit Animal Data</strong>
                        </div>
                        <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <?php
							$Query1="SELECT * FROM cow WHERE cow_id = '".$_REQUEST["ID"]."' ";
							$rst=mysqli_query($con,$Query1);
							$arr=mysqli_fetch_array($rst);
						?>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label"> Tag No</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Tag_No" value="<?=$arr["cow_tag_no"]?>" placeholder="Cow Tag No" class="form-control" readonly><small class="form-text text-muted">Enter Tag No here</small></div>
                          </div>						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Color</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Color" placeholder="Color" value="<?=$arr["color"]?>" class="form-control"><small class="form-text text-muted">Enter Cow Color here</small></div>
                          </div>
						  <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Horn</label></div>
                          <div class="col-12 col-md-9">
							<select name="Horn" class="form-control">
                                <option value="<?=$arr["horn"]?>"><?=$arr["horn"]?></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>                                
                              </select>
							<small class="form-text text-muted">Select Horn status here</small></div>
                          </div>
                          
                          
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Breed</label></div>
                            <div class="col-12 col-md-9">
							<select name="Bread" class="form-control">
							
                                <option value="<?=$arr["bread"]?>"><?=$arr["bread"]?></option>
                               <?php
									$Query2="SELECT * FROM breads";
									$rs=mysqli_query($con,$Query2);
									while($ar=mysqli_fetch_array($rs)){
								?>
                                <option value="<?=$ar["bread_name"]?>"><?=$ar["bread_name"]?></option>
								<?php
									}
								?>

								</select>
							<small class="form-text text-muted">Select Breed here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Age</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Age" value="<?=$arr["age"]?>" placeholder="Age" class="form-control"><small class="form-text text-muted">Enter Cow Age here</small></div>
                          </div>
						  
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Weight</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Weight" value="<?=$arr["weight"]?>" placeholder="Weight" class="form-control"><small class="form-text text-muted">Enter Weight here</small></div>
                          </div>
						   <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Gender</label></div>
                            <div class="col-12 col-md-9">
							<select name="Gender" class="form-control">
                                <option value="<?=$arr["gender"]?>"><?=$arr["gender"]?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Male Castrated">Male Castrated</option>
                              </select>
							<small class="form-text text-muted">Select Gender here</small></div>
                          </div>						  				  						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status</label></div>
                            <div class="col-12 col-md-9">
							<select name="Status" class="form-control">
						<?php
							$Query1="SELECT * FROM cow WHERE cow_id = '".$_REQUEST["ID"]."' ";
							$rst=mysqli_query($con,$Query1);
							$arr=mysqli_fetch_array($rst);
						?>                              
							  <option value="<?=$arr["status"]?>"><?=$arr["status"]?></option>
                                <option value="Active">Active</option>
                                <option value="Dead">Dead</option>
                              </select>
							<small class="form-text text-muted">Select Status here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date of Death</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Date" class="form-control"><small class="form-text text-muted">Select DoD here</small></div>
                          </div>
						   <div class="row form-group">
                            <div class="col-12 col-md-9"><input type="submit" name="btnSave" class="btn btn-primary" style="margin-left:50%; width:20%;" value="Save"></div>
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
