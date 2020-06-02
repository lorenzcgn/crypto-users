<?php
// Start the session
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    header("Location: /crypto/login.php");
		exit();
}
if($_SESSION['admin']==0){
    header("Location: /crypto/purposes.php");
		exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Delete purpose</title>
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

	<!-- Header section -->
	<header class="header-section clearfix">
		<div class="container-fluid">
			<a href="index.html" class="site-logo">
				<img src="img/logo.png" alt="">
			</a>
			<div class="responsive-bar"><i class="fa fa-bars"></i></div>
			<a href="" class="user"><i class="fa fa-user"></i></a>
			<a href="" class="site-btn">Sign Up Free</a>
			<nav class="main-menu">
				<ul class="menu-list">
					<li><a href="http://localhost/crypto/">Homepage</a></li>
					<li><a href="portfolio.php">Your Portfolio</a></li>
					<li><a href="add.php">Deposit</a></li>
           <li><a href="del.php">Withdraw</a></li>
					 <li><a href="purposes.php">Purposes</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Page info section -->
	<section class="page-info-section">
		<div class="container">
			<h2>Delete purpose</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Delete a purpose</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h5>We're deleting your purpose.</h5>
					
                    <?php
		
			// variabili
			$purposename = $_GET["purposename"];
			require_once "db.php";
			echo"<br></br>";
			
			//controlli
			
			$query = "SELECT * FROM purposes WHERE purpose = '$purposename'";
			$query2 = "SELECT * FROM walletts WHERE purpose = '$purposename'";
			$result = $connection->query($query);
			$result2 = $connection->query($query2);
			
			if ($result2->num_rows != 0){
			echo "<p style='color:red'>Sorry, you can't remove purpose $purposename if there are wallets with that purpose. But if you want you can change purposes of them and then delete '$purposename'. <br><br> But remember that even if you're an admin you can't change wallets' purposes you don't own.</p>";
			}
			else{
			if ($result->num_rows != 0){
			 $query = "DELETE FROM purposes WHERE purpose = '$purposename'";
				$connection->query($query);
				echo "You've deleted this new purpose: $purposename";
			}
			else {
				echo "<p style='color:red'>Purpose $purposename isn't in the database. Have you written correctly the name?</p>";
			}	
			}
			
			
			$result->free();
		$connection->close();
		?><br><br>
		<a class="site-btn sb-gradients sbg-line mt-5" href="http://localhost/crypto/purposes.php">
			See your purposes.
		</a>
		<a href='chpurpose.php' class='site-btn sb-gradients sbg-line mt-5'>Change purposes of wallets.</a>
			</div>
			</div>
			<div class="about-img">
				<img src="img/about-img.png" alt="">
			</div>
		</div>
	</section>
	<!-- About section end -->


<?php include 'footer.php' ?>

	