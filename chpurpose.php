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
table {
    background: linear-gradient(to right, #3e2bce 0%, #2dd3aa 100%, #2dd3aa 100%, #2dd3aa 100%);
    color: #fff;
    padding: 4px;
    border-radius: 5px;
    box-shadow: 0 6px 14px 0 rgba(33,35,68,.1)!important;
    border: none;
    border-collapse: collapse;
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
			<h2>Change purpose</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Change purpose of wallets</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
				  <div class="row align-items-start">

	
				<div class="col-4">
					<br>
					<h3>Follow the instructions to change purposes of your wallets.</h3>
                    
                    <form action="changepurpose.php" method="GET"><br>
		Select wallet you want to change description of:
		<br>
		<select name="portfoliocode">
<option value="pick" disabled selected value> Select wallet </option>

		<?php
require_once "db.php";
session_start();
		$username = $_SESSION['username'];
$sql = mysqli_query($connection, "Select DISTINCT portfoliocode FROM  walletts INNER JOIN users ON users.username=walletts.username WHERE walletts.username='$username'");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['portfoliocode'] ."'>" .$row['portfoliocode'] ."</option>" ;
}
?>
</select>
		
		<hr>
		
		Select the new purpose for your wallet
		
		<select name="purpose">
<option value="pick" disabled selected value> Select purpose of your wallet </option>
<?php
$sql = mysqli_query($connection, "Select DISTINCT purpose FROM  purposes");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['purpose'] ."'>" .$row['purpose'] ."</option>" ;
}

?>
</select>

		<br>
		
		<hr>	
		
        <input class="site-btn sb-gradients sbg-line mt-5" type="submit" value= "Change purpose">
      </form>
			<br>
			</div>
			<div class="col-8">
			<div class="">
			<?PHP
		
		
		
		$query = "Select purposes.purpose, walletts.portfoliocode, description, descrizione, btc, euro, ethereum, bitcoincash, xrp, litecoin, dash
FROM  (walletts INNER JOIN purposes ON walletts.purpose =purposes.purpose) INNER JOIN users ON users.username=walletts.username WHERE walletts.username = '$username'";
		$result = mysqli_query($connection, $query);
		if($result || mysqli_num_rows($result) == 0) {
			echo "<table border>";
			echo "<tr>";
			echo "<th> purpose</th>";
			echo "<th> purpose description</th>";
			echo "<th> wallet code</th>";
			echo "<th> wallet description</th>";
			echo "</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>$row[purpose]</td>";
				echo "<td>$row[description]</td>";
				echo "<td>$row[portfoliocode]</td>";
				echo "<td>$row[descrizione]</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else {
			echo "<p style='color:red'>No wallets found, but you can create them.</p>";
		}
		
		echo "<br>";
				echo "<h2>All purposes</h2>";
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
			echo "<p style='color:red'>No purposes found.</p>";
		}
        
        
		
			


mysqli_close($connection);
?>
            
		
			</div>
            
		</div>
            
            <div class="col-4">
                <h3>Suggested pages...</h3>
                <a href="chwallet.php" class="site-btn sb-gradients sbg-line mt-5">
		Change your wallets.
	</a>
                </div>
	</section>
	<!-- About section end -->


<?php include 'footer.php' ?>