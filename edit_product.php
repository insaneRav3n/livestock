<?php
include("include/db.php");
	if($_SESSION["TYPE"] == "")
	{
		header("Location: index.php?Err=Session Expired !");
		exit;
	} 
	if(isset($_REQUEST["btnSave"])){
		$target_dir = "images/Product Images/";
		$target_file = $target_dir.$_FILES["Image"]["name"];
		move_uploaded_file($_FILES["Image"]["tmp_name"], $target_file);
		$Query = "UPDATE product SET
		product_name = '".$_REQUEST["Name"]."',
		size = '".$_REQUEST["Size"]."',
		product_color = '".$_REQUEST["Color"]."',
		unit = '".$_REQUEST["Unit"]."',
		cost = '".$_REQUEST["Cost"]."',
		sale_price = '".$_REQUEST["Sale"]."',
		qty = '".$_REQUEST["Qty"]."',
		picture = '".$target_file."',
		fats = '".$_REQUEST["Fats"]."'
		WHERE product_id = '".$_REQUEST["ID"]."' ";
		if(mysqli_query($con,$Query)== TRUE){
			header("Location: product.php?Err=3");
		}
		else{
				header("Location: edit_product.php?Error=1");
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
                            <strong class="card-title">Edit Product</strong>
                        </div>
                        <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                         <?php
							$Query1="SELECT * FROM product WHERE product_id = '".$_REQUEST["ID"]."' ";
							$rst=mysqli_query($con,$Query1);
							$arr=mysqli_fetch_array($rst);
						?>
                          <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Name</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Name" value="<?=$arr["product_name"]?>" placeholder="Product Name" class="form-control"><small class="form-text text-muted">Enter Product Name here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Size</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Size" value="<?=$arr["size"]?>" placeholder="Product Size" class="form-control"><small class="form-text text-muted">Enter Product Size here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Color</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Color" value="<?=$arr["product_color"]?>" placeholder="Product Color" class="form-control"><small class="form-text text-muted">Enter Product Color here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Unit</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Unit" value="<?=$arr["unit"]?>" placeholder="Product Unit" class="form-control"><small class="form-text text-muted">Enter Product Unit here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Cost</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Cost" value="<?=$arr["cost"]?>" placeholder="Product Cost" class="form-control"><small class="form-text text-muted">Enter Product Cost here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Sale Price</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Sale" value="<?=$arr["sale_price"]?>" placeholder="Sale Price" class="form-control"><small class="form-text text-muted">Enter Sale Price here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Quantity</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Qty" value="<?=$arr["qty"]?>" placeholder="Product Quantity" class="form-control"><small class="form-text text-muted">Enter Product Quantity here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Product Image</label></div>
                            <div class="col-12 col-md-9"><input type="file" name="Image" value="<?=$arr["picture"]?>" class="form-control"><small class="form-text text-muted">Select Image here</small></div>
                          </div>
						  <div class="row form-group">
                            <div class="col col-md-3"></div>
							<div class="col-12 col-md-9"><img src="<?=$arr["picture"]?>" width="150px" height="150px"></div>
                          </div>
						  
						  <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Fats</label></div>
                            <div class="col-12 col-md-9"><input type="text" name="Fats" value="<?=$arr["fats"]?>" placeholder="Fats" class="form-control"><small class="form-text text-muted">Enter Fats here</small></div>
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
