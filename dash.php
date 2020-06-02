<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Homepage</title>
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
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<style>
	a:hover, a:focus {
    text-decoration: underline;
    outline: none;
}
</style>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'menu.php' ?>


	<!-- Hero section -->
	<section class="hero-section">
		<div class="container">
			<div class="row">
				
				<div class="col-md-6 hero-text">
					
					<h2>Invest with <span>Crypto</span> <br>Manage all your cryptocurrencies with many wallets</h2>
					<h4>Use modern progressive technologies of Bitcoin to earn money</h4>
					
					
							<a href="portfolio.php" class="site-btn sb-gradients sbg-line mt-5">
		> Go to the dashboard and start making operations! <
	</a>

					
				</div>
				<div class="col-md-6">
					<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<h1 style="color:white">Welcome <strong><?php echo $_SESSION['username']; ?>!</strong></h1>
			<p> <a href="portfolio.php" class="site-btn sb-gradients sbg-line mt-5"target="blank" >Portfolio</a> 
			<a href='index.php?logout='1'' class="site-btn sb-gradients sbg-line mt-5">Logout</a> </p>
			<?php  $username = $_SESSION['username'];?>
			
					<?php endif ?>
					<img src="img/laptop.png" class="laptop-image" width="400" alt="">
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->




<?php include 'facts.php' ?>
<?php include 'footer.php' ?>
