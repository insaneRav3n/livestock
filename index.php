<?php
		include("include/db.php");


		if(isset($_POST["btnLog"])){
		
			$Query1 = "SELECT * FROM login WHERE user_name = '".$_POST["User"]."' AND password = '".$_POST["Password"]."' AND type = 'admin' AND trial_time > now()";
			$rst1 = mysqli_query($con,$Query1);
			if(mysqli_num_rows($rst1) > 0){
					$arr = mysqli_fetch_array($rst1);
					$_SESSION["TYPE"] = $arr["type"];
                    $_SESSION["time"]=time();
					header("Location: home.php?Message=You are login successfully");
					exit;
			}	
			else
			{
					header("Location: index.php?Message=You enter wrong email address or password ");
					exit;
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
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
<style>
	.body{
		background-image:url("images/bg.jpg");
		background-repeat:no-repeat;
		background-size:cover;
		}
		</style>
</head>
<body class="body">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.php">
                        <h1 style="color:#00de00;"><b><font size="+5">Krishi Pragati</font></b></h1>
                        <marquee direction = "right">The TechWorks</marquee>

                    </a>
                </div>
                <div class="login-form">
                    <form name="Form" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="User" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="Password" class="form-control" placeholder="Password">
                        </div>                        
                        <input type="submit" name="btnLog" value="Login" class="btn btn-success btn-flat m-b-30 m-t-30">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>
