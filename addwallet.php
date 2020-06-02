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
	<style>
	.site-btn.sb-gradients.sbg-line {
    color: #ffffff;
    z-index: 1;
}
</style>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<?php include 'menu.php' ?>


	<!-- Page info section -->
	<section class="page-info-section">
		<div class="container">
			<h2>Add a new wallet</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Add a wallet to your portfolio</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h5>Follow the instructions to add a new wallet.</h5>
					
                    
                    
                    
                    <form action="insertwallet.php" method="GET"><br>

		Insert portfoliocode:
		<br>
        <input type="text" name="portfoliocode"><br>
		
		<hr>
		
		Select purpose for your wallet:
		<select name="purpose">
<option value="pick" disabled selected value> Select purpose of your wallet </option>
<?php
require_once "db.php";
$sql = mysqli_query($connection, "Select DISTINCT purpose FROM  purposes");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['purpose'] ."'>" .$row['purpose'] ."</option>" ;
}
mysqli_close($connection);
?>
</select>

		<br>
		
		<hr>
        
		Insert wallet description:
		<br>
        <input type="text" name="description"><br>
		
<br> <br>
        <input class="site-btn sb-gradients sbg-line mt-5" type="submit" value= "Add new wallet">
      </form>
				</div>
			</div>
			<div class="about-img">
				<img src="img/about-img.png" alt="">
			</div>
		</div>
	</section>
	<!-- About section end -->


<?php include 'footer.php' ?>