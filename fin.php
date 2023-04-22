<?php
include("include/db.php");
	// if(isset($_REQUEST["Delete"])){
	// 	$Query1="DELETE FROM purchase WHERE purchase_id = '".$_REQUEST["ID"]."'";
	// 	if(mysqli_query($con,$Query1)== TRUE){
	// 			header("Location: purchase.php?Err=2");
	// 		}
	// 		else{
	// 			header("Location: purchase.php?Error=1");
	// 		}
	// }
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


    <style>
table.GeneratedTable {
  width: 50%;
  background-color: #ffffff;
  border-collapse: collapse;
  border-width: 0px;
  border-color: #000000;
  border-style: solid;
  color: #000000;
}

table.GeneratedTable td, table.GeneratedTable th {
  border-width: 0px;
  border-color: #000000;
  border-style: solid;
  }

table.GeneratedTable thead {
  background-color: #999894;
}
</style>


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

<div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Financial Report</strong>
                        </div>
                        <div class="card-body">
                          <div class="row form-group">

						  <form method="POST" action="fin.php" class="form-control">
		                      <input type="date" name="term2" placeholder="From">-To-<input type="date" name="term4" placeholder="Upto">	
		                      <input type="submit" name="submit2sql" value="Search">
                          <small class="form-text text-muted">Select Date Range here</small>
                          </form>
                                                     
                          </div>
				       </div>
                    </div>
                </div>

<?php

if(isset($_POST['submit2sql'])){
    $from = $_POST['term2'];
    $to   = $_POST['term4'];
?>
         
       
  <div class="row">
  <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                        <strong class="card-title">  Profit Chart</strong>
                        </div>
                        <div class="card-body">

                        <?php
                      $Query_A="SELECT SUM(purchase_amount) AS PurTotal FROM purchase WHERE purchase_date BETWEEN '".$from."' AND '".$to."' ";							
                      $rstA=mysqli_query($con,$Query_A);
                      $rowA = mysqli_fetch_array($rstA);
                      $pur=$rowA["PurTotal"];

                      $Query_B="SELECT SUM(expense_amount) AS ExpTotal FROM expense WHERE expense_date BETWEEN '".$from."' AND '".$to."' ";
							        $rstB=mysqli_query($con,$Query_B);
                      $rowB = mysqli_fetch_array($rstB);
                      $exp=$rowB["ExpTotal"];

                      $Query_C="SELECT SUM(sale_amount) AS SaleTotal FROM sale WHERE sale_date BETWEEN '".$from."' AND '".$to."' ";
							        $rstC=mysqli_query($con,$Query_C);
                      $rowC = mysqli_fetch_array($rstC);
                      $sell=$rowC["SaleTotal"];

                        ?>
  
  <table>
  <thead>
    <tr>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <tr style="height:10px">
      <td><b>From Sales&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
      <td><b>&#8377;<?=$sell?></b></td>
    </tr>
    <tr style="height:10px">
      <td><b>Purchase&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
      <td><b>&#8377;<?=$pur?></b></td>
    </tr>
    <tr style="height:10px">
      <td><b>Other Expenses&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b></td>
      <td><b>&#8377;<?=$exp?></b></td>
    </tr>
    <tr style="height:10px">
      <td>------------------------------------</td>
      <td>----------------</td>      
    </tr>
    <tr style="height:10px">
        <td><center><b>Profit : </b></center><font size=-2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{ Sales -(Expense + Purchase)} </font> </td>
        <td VALIGN=TOP><b>&#8377;<?php
        $prof = $sell-($pur+$exp);
if($prof<1){
  echo $prof."<span>&#128308;</span>";
}else{
  echo $prof."<span>&#128994;</span>";
}        
        
        ?></b>
    </tr>
    <tr></tr>
  </tbody>
</table>

                        </div></div></div>
					

    <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Purchase Chart</strong>
                        </div>
                        <div class="card-body">
                         
                        <table  class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tag No</th>
                        <th>Date Of Purchase</th>
                        <th>Amount</th>               
                      </tr>
                    </thead>
                    <tbody>
					<?php
							$Query1="SELECT * FROM purchase WHERE purchase_date BETWEEN '".$from."' AND '".$to."'";
              $Query_1="SELECT SUM(purchase_amount) AS PurTotal FROM purchase WHERE purchase_date BETWEEN '".$from."' AND '".$to."' ";
							
                            $rst1=mysqli_query($con,$Query_1);
                            $row1 = mysqli_fetch_array($rst1);
							$rst=mysqli_query($con,$Query1);
							while($arr=mysqli_fetch_array($rst)){
					?>
                      <tr>
                        <td><?=$arr["purchase_id"]?></td>                        
                        <td><?=$arr["purchase_cow"]?></td>
                        <td><?=$arr["purchase_date"]?></td>
                        <td><?=$arr["purchase_amount"]?></td>
                        
                       
                      </tr>
						<?php
							}
						?>
                    </tbody>
                  </table>
                  <?php
                  $purchase=$row1["PurTotal"];
                  ?>
                  <b>  Total Purchase : &#8377; <?=$row1["PurTotal"];?></b>

                        
						</div>
                    </div>
                </div>
                </div>
				<div class="row">

                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Expense Chart</strong>
                        </div>
                        <div class="card-body">
                          
                        <table  class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Expense Type</th>
                        <th>Date Of Expense</th>
                        <th>Amount</th>               
                      </tr>
                    </thead>
                    <tbody>
					<?php
							$Query1="SELECT * FROM expense WHERE expense_date BETWEEN '".$from."' AND '".$to."'";
                            $Query_1="SELECT SUM(expense_amount) AS ExpTotal FROM expense WHERE expense_date BETWEEN '".$from."' AND '".$to."' ";
							$rst1=mysqli_query($con,$Query_1);
                            $row1 = mysqli_fetch_array($rst1);
                            
							$rst=mysqli_query($con,$Query1);
							while($arr=mysqli_fetch_array($rst)){
					?>
                      <tr>
                        <td><?=$arr["expense_id"]?></td>                        
                        <td><?=$arr["expense_name"]?></td>
                        <td><?=$arr["expense_date"]?></td>
                        <td><?=$arr["expense_amount"]?></td>
                        
                       
                      </tr>
						<?php
							}
						?>
                    </tbody>
                  </table>
                  <?php
                    $expense = $row1["ExpTotal"];
                  ?>
                  <b>  Total Expense :  &#8377; <?=$row1["ExpTotal"];?></b>

				       </div>
                    </div>
                </div>

               
                <div class="col-lg-6 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Sales Chart</strong>
                        </div>
                        <div class="card-body">
                        <table  class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Tag No</th>
                        <th>Date Of Sale</th>
                        <th>Amount</th>               
                      </tr>
                    </thead>
                    <tbody>
					<?php
							$Query1="SELECT * FROM sale WHERE sale_date BETWEEN '".$from."' AND '".$to."'";
                            $Query_1="SELECT SUM(sale_amount) AS SaleTotal FROM sale WHERE sale_date BETWEEN '".$from."' AND '".$to."' ";
							$rst1=mysqli_query($con,$Query_1);
                            $row1 = mysqli_fetch_array($rst1);
                            $rst=mysqli_query($con,$Query1);
							while($arr=mysqli_fetch_array($rst)){
					?>
                      <tr>
                        <td><?=$arr["sale_id"]?></td>                        
                        <td><?=$arr["sale_cow"]?></td>
                        <td><?=$arr["sale_date"]?></td>
                        <td><?=$arr["sale_amount"]?></td>
                        
                       
                      </tr>
						<?php
							}
                            
						?>
                        
                    </tbody>
                  </table>
                  <?php 
                        $sale = $row1["SaleTotal"];
                  ?>
                <b>  Total Sale :  &#8377; <?=$row1["SaleTotal"];?></b>

				       </div>
                    </div>
                </div>




                <?php }?>

   
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
