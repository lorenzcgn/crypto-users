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
	<title>Change wallet</title>
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
			<h2>Change wallet</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Change wallet </span>
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
		    error_reporting (E_ALL ^ E_NOTICE);
			// variabili
			$portfoliocode = $_GET["portfoliocode"];
			$description = $_GET["description"];
			require_once "db.php";
			echo"<br></br>";
			
			
			
			//controlli
			
			$query = "SELECT * FROM walletts WHERE portfoliocode = '$portfoliocode'";
			$result = $connection->query($query);
			
			if(mysqli_num_rows($result) != 0) {
				
				$query = "SELECT descrizione FROM walletts WHERE portfoliocode = '$portfoliocode'";
		$result = mysqli_query($connection, $query);
		if($result || mysqli_num_rows($result) == 0) {
			
			while ($row = mysqli_fetch_array($result)) {
				$olddescrizione= $row['descrizione'];
			
			}
				
				if($olddescrizione==$description || empty($description)==true){
					echo "<p style='color:red'>That's an error! You've inserted same description or description is empty!</p>";
				}
				else{
					
					
					
					
					$query5 = "UPDATE walletts SET descrizione='$description' WHERE portfoliocode = '$portfoliocode'";
					$result5 = $connection->query($query5);
					echo"We've updated your portfolio $portfoliocode correctly!";
					
				}
			
			}
			
			
			
			
			
			
			}
			else{
							echo "<p style='color:red'>Wallet with this code $portfoliocode isn't in the database. Have you written correctly the code? <br> Alert: you can change just your wallets.</p>";
			}
			
			
			
			
			
			$result->free();
		$connection->close();
		?><br><br>
		
		<a class="site-btn sb-gradients sbg-line mt-5" href="chwallet.php">
			Change other wallets.
		</a>
		<a class="site-btn sb-gradients sbg-line mt-5" href="portfolio.php">
			See your wallets.
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