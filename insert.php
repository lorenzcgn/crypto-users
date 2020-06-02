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
	<title>Deposit</title>
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
					<h5>Cool! You've completed the deposit.</h5>
					
                    <?php
		error_reporting(0);

			// variabili
			$purpose = $_GET["purpose"];
			$portfoliocode = $_GET["portfoliocode"];
			$quantity = $_GET["quantity"];
			$cryptocurrency = $_GET["cryptocurrency"];
			require_once "db.php";
			session_start();
		$username = $_SESSION['username'];
			
			
			
			
			if (empty($quantity)==true){
				echo"<p style='color:red'>Are you joking with me? You shouldn't do that $username!</p>";
			}
			else{
			echo "You've selected this purpose for your deposit: $purpose";
			echo"<br></br>";
			echo "You've selected the portfolio: $portfoliocode";
			echo"<br></br>";
			
			
			$query = "SELECT * FROM walletts WHERE walletts.portfoliocode='$portfoliocode' OR  walletts.purpose='$purpose' AND walletts.username='$username'";
			$result = mysqli_query($connection, $query);
			$righe= mysqli_num_rows($result);
			if($righe == 0) {
			
			echo"You don't have portfolio with those details $username, sorry!";
			
			}
			else{

			
			// controlli
			if (empty($purpose)) {
						if (empty($portfoliocode)){
							echo "<p style='color:red'>You didn't selected anything (portfoliocode or purpose)!</p>";
						}
						else {
					$query = "UPDATE walletts SET walletts.$cryptocurrency=($cryptocurrency+$quantity) WHERE walletts.portfoliocode = '$portfoliocode'";
$connection->query($query);
echo "We've added $quantity $cryptocurrency.";
			            }
			}
		    if (empty($portfoliocode)) {
						if (empty($purpose)){
							echo "<p style='color:red'>You didn't selected anything (portfoliocode or purpose)!</p>";
						}
						else {
							
							
					$query = "UPDATE walletts SET walletts.$cryptocurrency=($cryptocurrency+$quantity) WHERE walletts.purpose='$purpose' AND username='$username'";
		$connection->query($query);
        echo "We've added $quantity $cryptocurrency.";
							            }
			}
			else{
				$query = "UPDATE walletts SET walletts.$cryptocurrency=($cryptocurrency+$quantity) WHERE walletts.purpose = '$purpose' AND walletts.portfoliocode='$portfoliocode'";
$results = mysqli_query($connection, $query);

			if (mysqli_num_rows($results) == 0) {
            echo "<p style='color:red'>You selected a wallet and purpose which it doesn't belong to!</p>";
			}
            else{
                echo "We've added $quantity $cryptocurrency.";
            }

			
			// aggiornamento
			
				
			}
			
            }
            }
		
		$connection->close();
		?><br><br>
		<a class="site-btn sb-gradients sbg-line mt-5" href="portfolio.php">
			See your portfolios.
		</a>
		<a class="site-btn sb-gradients sbg-line mt-5" href="add.php">
			Make another deposit.
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