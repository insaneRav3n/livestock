<?php
include("include/db.php");
	if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
	if(isset($_REQUEST["Delete"])){
		$Query1="DELETE FROM sale WHERE sale_id = '".$_REQUEST["ID"]."'";
		$rst=mysqli_query($con,$Query1);
		header("Location: sales.php?Err=2");
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Purchase Report </strong>
                            <form method="POST" action="purchase_report.php" class="form-control">
		                      <input type="date" name="term2" placeholder="From">-To-<input type="date" name="term4" placeholder="Upto">	
		                      <input type="submit" name="submit2sql" value="Search">
                          </form>
                    
                        </div>
                        <?php

                            if(isset($_POST['submit2sql'])){
                                $from = $_POST['term2'];
                                $to   = $_POST['term4'];
                        ?>
                        <div class="card-body">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tag</th>
                        <th>Date</th>                        
                        <th>Amount</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
							$Query1="SELECT * FROM purchase WHERE purchase_date BETWEEN '".$from."' AND '".$to."'";
							$rst=mysqli_query($con,$Query1);
							while($arr=mysqli_fetch_array($rst)){
					?>
                    <tr>
                        <td><?=$arr["purchase_id"]?></td>
                        <td><?=$arr["purchase_cow"]?></td>
                        <td><?=$arr["purchase_date"]?></td>                       
                        <td> &#8377; <?=$arr["purchase_amount"]?></td>                        
                        <td>	
							<a href="edit_purchase.php?ID=<?=$arr["purchase_id"]?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i>Update</a>
							<a href="purchase.php?Delete&ID=<?=$arr["purchase_id"]?>" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i>Delete </a>
						</td>
                    </tr>
                    <?php
						}}
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
          $('#bootstrap-data-table-export').DataTable({
            dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    }
          );
        } );
    </script>


</body>
</html>
