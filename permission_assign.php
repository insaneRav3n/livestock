<?php
		include("include/db.php");
		if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
	if(isset($_REQUEST["btnSave"]))
			{			
				for($i = 0; $i<count($_REQUEST['value1']); $i++)
				{
					$query = "SELECT * FROM permission_control WHERE user_type = '".$_REQUEST['Group']."' AND module_id = ".$_REQUEST['value1'][$i] ;
					$r = mysqli_query($con,$query);
					if(mysqli_num_rows($r) > 0)
					{
						$c =  $_REQUEST["function".$_REQUEST['value1'][$i]];
						$im = implode(",", $c);
							$Q = "UPDATE permission_control SET functions_id = '".$im."' WHERE user_type = '".$_REQUEST['Group']."' AND module_id ='".$_REQUEST['value1'][$i]."' AND group_id = '".$_REQUEST['ID']."' ";
							mysqli_query($con,$Q);
					}
			else{
							$c =  $_REQUEST["function".$_REQUEST['value1'][$i]];
							$im = implode(",", $c);
							$Query1 = "INSERT INTO permision_control (user_type, module_id, functions_id , group_id) VALUES('".$_REQUEST['Group']."', '".$_REQUEST['value1'][$i]."', '".$im."','".$_REQUEST['ID']."') ";
							mysqli_query($con,$Query1);
				}
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Permission Control</strong>
							  </div>
                        <div class="card-body">
                     <table id="bootstrap-data-table" class="table table-striped table-bordered">
	 <thead>
             <tr>
             		<th>Modules</th>
             	<?php
							$Query ="SELECT * FROM functions";
							$rst = mysqli_query($con,$Query);
							while($arr=mysqli_fetch_array($rst)){
				?>
                	<th><?=$arr["functions"];?></th>
                    <?php
							}
					?>
             </tr>
             </thead>
             <tfoot>
             	<tr>
                	<td colspan="5" align="center"> 
                    	<input type="submit" name="btnSave" value="Save" class="btn btn-success"> 
                    </td>
                </tr>
             </tfoot>
             <tbody>
					<?php
							$Query ="SELECT * FROM modules";
							$rst = mysqli_query($con,$Query);
							while($arr=mysqli_fetch_array($rst))
							{
								$fchk = array();
								$mchecked = "";
								$Query2 = "SELECT * FROM permission_control WHERE user_type = '".$_REQUEST["Group"]."' AND module_id =".$arr["modules_id"];
								$rstfun = mysqli_query($con,$Query2);
								if(mysqli_num_rows($rstfun) > 0)
									{
										$mchecked = "CHECKED";
										$arrfun = mysqli_fetch_array($rstfun);
										$fchk = explode(",", $arrfun["functions_id"]);
									}
								else
									{
										$mchecked = "";
										$fchk = array();
									}

					?>
			<tr>
    				<th><input type="hidden" name="value1[]" value="<?=$arr["modules_id"]; ?>" > <?=$arr["module_name"]; ?></th>
						<?php
							$Count = 0;
                            $Query ="SELECT * FROM functions";
                            $rst1 = mysqli_query($con, $Query);
                            while($arr1=mysqli_fetch_array($rst1))
                            {
								if (in_array($arr1["function_id"], $fchk))
										$Checked = "CHECKED";
								else
										$Checked = "";
						?>
                    <td>
				    	<input type="checkbox" name="function<?php echo($arr["modules_id"]); ?>[]" value="<?php echo($arr1["function_id"]); ?>"
                    	<?php echo($Checked);?> >
                   </td>
                        <?php
							$Count++;
						        }
                        ?>
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
