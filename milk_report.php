<?php
include("include/db.php");
	if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
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
	<script>
    function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
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
						<div class="card-body">
							<form name="Form" method="post">
							<div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Cow</label></div>
                            <div class="col-12 col-md-9">
								<select name="Cow" class="form-control">
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

						  <div class="row form-group">
                            <div class="col-12 col-md-9"><input type="submit" name="btnSearch" class="btn btn-primary" style="margin-left:50%; width:20%;" value="Search"> </div>
                          </div>
						  </form>
					    </div>
						</div>
						</div>
					</div>
				</div>
                <div class="row" id="Print">
                <div class="col-md-12">
                    <div class="card ">
                        <div class=" col-md-12 card-header ">
                            <div class="col-md-6"><strong class="card-title">Milking Report</strong></div>
							<div class="col-md-6 pull-right"><input type="button" name="btnPrint" class="btn btn-primary" value="Print" onClick="printDiv('Print');"></div>

                        </div>
                        <div class="card-body">
                     <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Cow</th>
                        <th>Milk Quantity</th>
                        <th>Date</th>
                        <th>Time</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
							if(isset($_REQUEST["btnSearch"])){
								$Query1="SELECT * FROM milking WHERE cow LIKE '%".$_REQUEST["Cow"]."%'";
								$rst=mysqli_query($con,$Query1);
								while($arr=mysqli_fetch_array($rst)){
					?>
                    <tr>
                        <td><?=$arr["milking_id"]?></td>
                        <td><?=$arr["cow"]?></td>
                        <td><?=$arr["qty"]?></td>
                        <td><?=$arr["date"]?></td>
                        <td><?=$arr["time"]?></td>
					</tr>
					  <?php
							}
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
