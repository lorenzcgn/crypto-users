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
	<title>Withdraw</title>
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
			<h2>Withdrawal completed!</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Withdraw into your wallets</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h5>Cool! You've completed the withdrawal.</h5>
					
                    <?php
					error_reporting(0);
		
			// variabili
			$purpose = $_GET["purpose"];
			$portfoliocode = $_GET["portfoliocode"];
			$quantity = $_GET["quantity"];
			$cryptocurrency = $_GET["cryptocurrency"];
			require_once "db.php";
			
			
			
			
			
			echo "You've selected this purpose for your withdrawal: $purpose";
			echo"<br></br>";
			echo "You've selected the portfolio: $portfoliocode";
			echo"<br></br>";
			
			// controlli
			if (empty($purpose)) {
						if (empty($portfoliocode)){
                            
                            $query = "SELECT walletts.portfoliocode FROM walletts WHERE (walletts.$cryptocurrency-$quantity)>=0";
                            $result = $connection->query($query);
                            
                                if (mysqli_num_rows($result)>0){
                                    $query = "UPDATE walletts SET walletts.$cryptocurrency=($cryptocurrency-$quantity)";
                                // aggiornamento
			$connection->query($query);
			echo "We've sent you $quantity $cryptocurrency.";
                                }                        
                                else {
                                    echo "<p style='color:red'>You can not withdraw more than you have on your selected wallet, we are not a bank and we do not make loans, we are sorry! ;) :D
									</p>";
                                }
						}
						else {
                            
                            
                            $query = "SELECT walletts.portfoliocode FROM walletts WHERE (walletts.$cryptocurrency-$quantity)>=0 AND walletts.portfoliocode = '$portfoliocode'";
                            $result = $connection->query($query);
                            
                                if (mysqli_num_rows($result)>0){
                                    $query = "UPDATE walletts SET walletts.$cryptocurrency=($cryptocurrency-$quantity) WHERE walletts.portfoliocode = '$portfoliocode'";
                                // aggiornamento
			$connection->query($query);
			echo "We've sent you $quantity $cryptocurrency.";
                                }                        
                                else {
                                    echo "<p style='color:red'>You can not withdraw more than you have on your selected wallet, we are not a bank and we do not make loans, we are sorry! ;) :D</p>";
                                }
                            
                            
			            }
            }
		    
            
            elseif (empty($portfoliocode)) {
						if (empty($purpose)){
                            
                            
                            $query = "SELECT walletts.portfoliocode FROM walletts WHERE (walletts.$cryptocurrency-$quantity)>=0";
                            $result = $connection->query($query);
                            
                                if (mysqli_num_rows($result)>0){
                                    $query = "UPDATE walletts SET walletts.$cryptocurrency=($cryptocurrency-$quantity)";
                                // aggiornamento
			$connection->query($query);
			echo "We've sent you $quantity $cryptocurrency.";
                                }                        
                                else {
                                    echo "<p style='color:red'>You can not withdraw more than you have on your selected wallet, we are not a bank and we do not make loans, we are sorry! ;) :D</p>";
                                }
						}
						else {
                            $query = "SELECT walletts.portfoliocode FROM walletts WHERE (walletts.$cryptocurrency-$quantity)>=0 AND walletts.purpose='$purpose'";
                            $result = $connection->query($query);
                            
                            if (mysqli_num_rows($result)>0){
                                    $query = "UPDATE walletts SET walletts.$cryptocurrency=(walletts.$cryptocurrency-$quantity) WHERE walletts.purpose='$purpose'";
                                // aggiornamento
			$connection->query($query);
			echo "We've sent you $quantity $cryptocurrency.";
                            }
                                else {
                                    echo "<p style='color:red'>You can not withdraw more than you have on your selected wallet, we are not a bank and we do not make loans, we are sorry! ;) :D</p>";
                                }
                            
                            
                            
						}
			}
			else {
                $query = "SELECT walletts.portfoliocode FROM walletts WHERE (walletts.$cryptocurrency-$quantity)>=0 AND  walletts.purpose = '$purpose' AND walletts.portfoliocode='$portfoliocode'";
                            $result = $connection->query($query);
                            
                                if (mysqli_num_rows($result)>0){
									
                                    $query = "UPDATE walletts SET walletts.$cryptocurrency=($cryptocurrency-$quantity) WHERE walletts.purpose = '$purpose' AND walletts.portfoliocode='$portfoliocode'";
                                // aggiornamento
			$connection->query($query);
			echo "We've sent you $quantity $cryptocurrency.";
                                }                        
                                else {
                                    
                                   echo "<p style='color:red'>You can not withdraw more than you have on your selected wallet, we are not a bank and we do not make loans, we are sorry! ;) :D
									<br><br>You can't also select purposes different from your portfolio's purpose: use one of them.</p>";
                                }
							
				
			}
			
			
			
		
		$connection->close();
		?><br><br>
		<a class="site-btn sb-gradients sbg-line mt-5" href="portfolio.php">
			See your portfolios.
		</a>
		<a class="site-btn sb-gradients sbg-line mt-5" href="del.php">
			Make another withdrawal.
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