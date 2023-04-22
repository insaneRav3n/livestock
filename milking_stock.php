<?php
include("include/db.php");
	if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
if(isset($_REQUEST["btnSave"])){
	
$Query = "INSERT INTO milking_sale
		(milk_sale,supplier,date)
		VALUES ('".$_REQUEST["Sale"]."',
		'".$_REQUEST["Supplier"]."',
		'".$_REQUEST["Date"]."')";
	
		if(mysqli_query($con,$Query)==TRUE){
		header("Location: milking_stock.php?Err=1");
		}
		else{
			header("Location: milking_stock.php?Error=1");
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
                   <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            			
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
 <?php
				if(isset($_REQUEST["Err"]))
				{
					if($_REQUEST["Err"] == 1)
						$Err = "Add Successfully !";
					
					if($_REQUEST["Err"] == 2)
						$Err = "Deleted Successfully !";
					if($_REQUEST["Err"] == 3)
						$Err = "Updated Successfully !";
				
			?>
			  <div class="col-sm-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                 <?=$Err;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
			<?php
				}
			?>
			 <?php
				if(isset($_REQUEST["Error"]))
				{
					if($_REQUEST["Error"] == 1)
						$Err = "Query is not execute!";
					
			?>
			  <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                 <?=$Err;?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
			<?php
				}
			?>
                <div class="col-md-6">
                    <div class="card">
                         <div class="card-header">
                            <strong class="card-title">Milking Stock</strong>
			            </div>
                        <div class="card-body">
                     <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                    	<th>Total Milk Stock</th>
						<th>Current Stock</th>
					</tr>
                    </thead>
                    <tbody>
					<?php
							$Query2="SELECT SUM(milk_sale) AS TOTAL_SALE FROM milking_sale";
							$rst2=mysqli_query($con,$Query2);
							$arr2=mysqli_fetch_array($rst2);

							$Query1="SELECT SUM(qty) AS TOTAL_STOCK FROM milking";
							$rst=mysqli_query($con,$Query1);
							while($arr=mysqli_fetch_array($rst)){
								$Current_Stock = $arr["TOTAL_STOCK"] - $arr2["TOTAL_SALE"];
					?>
                    <tr>
                        <td><input type="hidden" name="Total" value="<?=$arr["TOTAL_STOCK"]?>"><?=$arr["TOTAL_STOCK"]?></td>
                        <td><input type="hidden" name="Current" value="<?=$Current_Stock?>"><?=$Current_Stock?></td>
                    </tr>
					  <?php
							
							}
						?>
                      
                    </tbody>
                  </table>
               
                        </div>
                    </div>
                </div>
				
				
                <div class="col-md-6">
                    <div class="card">
                         <div class="card-header">
                            <strong class="card-title">Total Sale</strong>
			            </div>
                        <div class="card-body">
                     <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                    	<th>Total Milk Sale</th>
					</tr>
                    </thead>
                    <tbody>
					
                    <tr>
                        <td><input type="hidden" name="T_SALE" value="<?=$arr2["TOTAL_SALE"]?>"><?=$arr2["TOTAL_SALE"]?></td>
                    </tr>
                      
                    </tbody>
                  </table>
               
                        </div>
                    </div>
                </div>

                </div>
				<div class="row">
					   <div class="col-md-12">
                    <div class="card">
                         <div class="card-header">
                            <strong class="card-title">Milk Sale</strong>
			            </div>
                        <div class="card-body">
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sale</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Sale" placeholder="Sale" class="form-control"><small class="form-text text-muted">Enter Milk Sale here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Supplier</label></div>
                            <div class="col-12 col-md-9">
							<input type="text" name="Supplier" placeholder="Enter Supplier Name" class="form-control">
							<small class="form-text text-muted">Enter Supplier Name here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Date</label></div>
                            <div class="col-12 col-md-9"><input type="date" name="Date" class="form-control"><small class="form-text text-muted">Select Date here</small></div>
                          </div>

						  <div class="row form-group">
                            <div class="col-12 col-md-9"><input type="submit" name="btnSave" class="btn btn-primary" style="margin-left:50%; width:20%;" value="Save"></div>
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
