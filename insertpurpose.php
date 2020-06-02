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
	<title>Add purpose</title>
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
			<h2>Add purpose</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Add a purpose</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h5>We're adding your purpose.</h5>
					
                    <?php
		error_reporting(E_ALL ^ E_NOTICE);

			// variabili
			$purposename = $_GET["purposename"];
			$purposedescription = $_GET["purposedescription"];
			require_once "db.php";
			echo"<br></br>";
			
			//controlli
			
			$query = "SELECT * FROM purposes WHERE purpose = '$purposename'";
			$result = $connection->query($query);
			
			if ($result->num_rows != 0)
				echo "Purpose $purposename is already in the database.";
			else
			{
				$query = "INSERT INTO purposes VALUES ('$purposename', '$purposedescription')";
				$connection->query($query);
				echo "You've added this new purpose: $purposename, with this description: $purposedescription";
			}
			$result->free();
		$connection->close();
		?><br><br>
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