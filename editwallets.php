<?php
// Start the session
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    header("Location: /crypto/login.php");
		exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Edit wallets</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/themify-icons.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	
	  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">



	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  
	  	<link rel="stylesheet" href="https://ds.fusioncharts.com/2.0.8/css/ds.css">

	<script src="https://ds.fusioncharts.com/2.0.8/js/ds.js"></script>
	<script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	

	<![endif]-->

	<link rel="stylesheet" href="css/style.css"/>


</head>
	
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	
<?php include 'menu.php' ?>



	<!-- Page info section -->
	<section class="page-info-section">
		<div class="container">
			<h2>Edit your wallets as you want</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i>Edit wallets</span>
			</div>
			<div class="img">
				<img src="img/about-img.png" float="right" with="200px" >
			</div>
		</div>
	</section>
	
	<section class="about-section spad">
		
			<div class="container">
			<div class="container-fluid">
				
						
				  <div class="row align-items-start">

        <div class="col-4">

			<a href="chwallet.php" class="site-btn sb-gradients sbg-line mt-5">
		 Change your wallets. 
	</a>
        </div>
        <div class="col-4">

	<a href="chpurpose.php" class="site-btn sb-gradients sbg-line mt-5">
		 Change wallets' purposes. 
	</a>
   </div>

			
			
		</div>
		
		
		
		
	</section>
	<!-- About section end -->


<?php include 'footer.php' ?>



