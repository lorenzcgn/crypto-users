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
	<title>Add a wallet</title>
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
			<h2>Deposit completed!</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Deposit into your wallets</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					
					
                    <?php
		error_reporting(E_ALL ^ E_NOTICE);
		
		

			// variabili
			$purpose = $_GET["purpose"];
			$portfoliocode = $_GET["portfoliocode"];
			$description = $_GET["description"];
			require_once "db.php";
			
			session_start();
		$username = $_SESSION['username'];
		echo"<h5>We are working for you, $username :)</h5>";
			
			
			
			if (empty($purpose)==true || empty($portfoliocode)==true || empty($description)==true){
				
				echo "You should insert what I need to work sir!";
			}
			
			else{
				
				 
				$query = "Select * FROM walletts INNER JOIN users ON users.username=walletts.username WHERE walletts.portfoliocode='$portfoliocode'";
				$result = mysqli_query($connection, $query);
				if(mysqli_num_rows($result) != 0) {
					echo "There's already a wallet with that code $username!";
				}
				else{
				echo "You've selected this wallet code for you new wallet: $portfoliocode";
				echo"<br></br>";
				echo "You've selected this purpose: $purpose";
				echo"<br></br>";	
				

			
			

				$query = "insert into walletts(portfoliocode, purpose, username, descrizione, btc, euro, ethereum, bitcoincash, xrp, litecoin, dash)values ('$portfoliocode', '$purpose', '$username','$description','0','0','0','0','0','0','0')";
				
				$connection->query($query);
				echo "We've added correctly your new wallet";
					
					
				}

			}
			
			
		
		$connection->close();
		?><br><br>
		<a class="site-btn sb-gradients sbg-line mt-5" href="portfolio.php">
			See your portfolio.
		</a>
		<a class="site-btn sb-gradients sbg-line mt-5" href="addwallet.php">
			Add another wallet.
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