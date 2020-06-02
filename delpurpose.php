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
		<link rel="stylesheet" href="css/style.css"/>


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
				  <div class="row align-items-start">

	
				<div class="col-6">
					<h5>Follow the instructions to delete a purpose.</h5>
					
                    
                    
                    
                    <form action="deletepurpose.php" method="GET"><br>
		Insert name: 
        <input type="text" name="purposename"><br>		
		
        <input class="site-btn sb-gradients sbg-line mt-5" type="submit" value= "Delete purpose">
      </form>
			<br>
				<img src="img/about-img.png" alt="">
				
			</div>
			<br><br>
			<div class="col-4">
			<?PHP
		require_once "db.php";
		
		session_start();
		$username = $_SESSION['username'];
		
		$query = "Select DISTINCT COUNT(purpose) as 'totalpurposes' FROM purposes";
		$result = mysqli_query($connection, $query);
		if($result || mysqli_num_rows($result) == 0) {
			echo "<table>";
			echo "<tr>";
			echo "</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>total purposes: $row[totalpurposes]</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else {
			echo "<p style='color:red'>No purposes found. You can add a new one!</p>";
		}
			
		
		echo "<br>";
				echo "<h2>All your purposes</h2>";
									echo"<h5>Here you can see all purposes for your wallets.</h5>";

		
		$query = "Select DISTINCt purpose, description FROM  purposes";
		$result = mysqli_query($connection, $query);
			
			if($result || mysqli_num_rows($result) == 0) {
			echo "<table border>";
			echo "<tr>";
			echo "<th> purposes</th>";
			echo "<th> description</th>";
			echo "</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>$row[purpose]</td>";
				echo "<td>$row[description]</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else {
			echo "<p style='color:red'>No purposes found. You can add a new one!</p>";
		}
		
			


mysqli_close($connection);
?>
		
			</div>
			</div>
		</div>
	</section>
	<!-- About section end -->


<?php include 'facts.php' ?>
<?php include 'footer.php' ?>