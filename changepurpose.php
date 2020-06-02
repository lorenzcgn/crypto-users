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
	<title>Change purpose</title>
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
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

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
			<h2>Change purpose</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Change purpose of wallets </span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h5>We're changing purpose of your wallet.</h5>
					
                    <?php
		
			// variabili
			$purpose = $_GET["purpose"];
			$portfoliocode = $_GET["portfoliocode"];
			require_once "db.php";
			echo"<br></br>";
			
			//controlli
			
			$query = "SELECT * FROM walletts WHERE portfoliocode = '$portfoliocode'";
			$result = $connection->query($query);
			
			if ($result->num_rows != 0){
				
				$query2 = "SELECT purpose FROM walletts WHERE portfoliocode = '$portfoliocode'";
				$result2 = $connection->query($query);
				
				if($result2==$purpose){
					echo"<p style='color:red'>Why are you trying to change your wallet's purpose again to the same purpose? Are you trying to testing me? You shouldn't do that!</p>";
				}
				else{
				
			 $query = "UPDATE walletts SET purpose= '$purpose' WHERE portfoliocode = '$portfoliocode'";
				$connection->query($query);
				echo "<p style='color:red'>You've changed purpose to $purpose of your wallet with this code: $portfoliocode</p>";
				}
			}
			else {
				echo "<p style='color:red'>Wallet with this code $portfoliocode isn't in the database. Have you written correctly the code?</p>";
			}	
			
			
			
			$result->free();
		$connection->close();
		?><br><br>
		
		<a class="site-btn sb-gradients sbg-line mt-5" href="chpurpose.php">
			Change other purposes.
		</a>
		<a class="site-btn sb-gradients sbg-line mt-5" href="purposes.php">
			See your purposes.
		</a>
			</div>
			</div>
			<div class="about-img">
				<img src="img/about-img.png" alt="">
			</div>
		</div>
	</section>
	<!-- About section end -->


<?php include 'footer.php' ?>