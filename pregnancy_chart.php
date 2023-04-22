<?php
include("include/db.php");
	if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
    $zero=0;
	if(isset($_REQUEST["Delete"])){
		$Query1="DELETE FROM pregnancy WHERE pregnancy_id = '".$_REQUEST["ID"]."'";
        $Query2="UPDATE cow SET 
        pgstat = '".$zero."'
        WHERE cow_tag_no = '".$_REQUEST["name"]."' ";
		if(mysqli_query($con,$Query1)== TRUE){
				header("Location: pregnancy_chart.php?Err=2");
                mysqli_query($con,$Query2);
			}
			else{
				header("Location: pregnancy_chart.php?Error=1");
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
                            <strong class="card-title">Pregnancy Detail</strong>
                                             <a href="add_pregnancy.php" class="btn btn-success" style="margin-left:75%;"><i class="fa fa-plus"></i>Add Pregnant Animal</a>
<!--									<a href="add_feeding.php" class="btn btn-success" style="margin-left:60%;"><i class="fa fa-plus"></i>Add Feeding</a> -->
						</div>
                        <div class="card-body">
                   <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tag No</th>
                        <th>Pregnancy From</th>
                        <th>Pregnancy To</th>
						<th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
							$Query1="SELECT * FROM pregnancy";
							$rst=mysqli_query($con,$Query1);
							while($arr=mysqli_fetch_array($rst)){
					?>
                      <tr>
                        <td><?=$arr["pregnancy_id"]?></td>
                        <td><?=$arr["pregnancy_cow"]?></td>
                        <td><?=$arr["pregnancy_date_from"]?></td>
                        <td><?=$arr["pregnancy_date_to"]?></td>
						<td>	
							<a href="edit_pregnancy.php?ID=<?=$arr["pregnancy_id"]?>" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i>Update</a>
							

                            <?php echo"<a class='btn btn-danger btn-sm' onClick=\"javascript: return confirm('Do you Really want to Delete ? ');\" href='pregnancy_chart.php?Delete&ID=".$arr["pregnancy_id"]."&name=".$arr["pregnancy_cow"]."'><i class='fa fa-trash'></i>Delete&nbsp;&nbsp;</a>"; ?>
                    </td>
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
