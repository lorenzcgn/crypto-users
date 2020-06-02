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
			<h2>Make your deposit</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Add cryptocurrencies to your portfolios</span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h5>Follow the instructions to make a deposit.</h5>
					
                    
                    
                    
                    <form action="insert.php" method="GET"><br>

		Select portfoliocode (or add cryptos to all wallets with or without specific purpose):
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
		
		Select purpose for your deposit (or deposit cryptos to wallets with a specific portfoliocode):
		
		<select name="purpose">
<option value="pick" disabled selected value> Select purpose of your wallet </option>
<?php
session_start();
		$username = $_SESSION['username'];
$sql = mysqli_query($connection, "Select DISTINCT walletts.purpose FROM  (purposes JOIN walletts ON walletts.purpose=walletts.purpose) JOIN users ON users.username=walletts.username WHERE users.username='$username'");
$row = mysqli_num_rows($sql);
while ($row = mysqli_fetch_array($sql)){
echo "<option value='". $row['purpose'] ."'>" .$row['purpose'] ."</option>" ;
}

?>
</select>

		<br>
		
		<hr>
        
		Insert quantity:
		<br>
        <input type="number" name="quantity"><br>
		
		<hr>

		
        <select name="cryptocurrency">
            <option value="btc">bitcoin</option>
			<option value="euro">euro</option>
            <option value="ethereum">ethereum</option>
            <option value="bitcoincash">bitcoincash</option>
            <option value="xrp">xrp</option>
            <option value="litecoin">litecoin</option>
            <option value="dash">dash</option>
        </select> <br> <br>
        <input class="site-btn sb-gradients sbg-line mt-5" type="submit" value= "Add to your wallet">
      </form><br><br>
                    </div>
                    <?php
                    echo "<h1>All your wallets, $username!</h1>";
									

				
		$query = "Select purposes.purpose, walletts.portfoliocode, description, descrizione, btc, euro, ethereum, bitcoincash, xrp, litecoin, dash
FROM  (walletts INNER JOIN purposes ON walletts.purpose =purposes.purpose) INNER JOIN users ON users.username=walletts.username WHERE users.username = '$username'";
		$result = mysqli_query($connection, $query);
		if(mysqli_num_rows($result) == true) {
			echo "<table border>";
			echo "<tr>";
			echo "<th> purpose</th>";
			echo "<th> purpose description</th>";
			echo "<th> wallet code</th>";
			echo "<th> wallet description</th>";
			echo "<th> btc</th>";
			echo "<th> euro</th>";
			echo "<th> ethereum</th>";
			echo "<th> bitcoincash</th>";
			echo "<th> xrp</th>";
			echo "<th> litecoin</th>";
			echo "<th> dash</th>";
			echo "</tr>";
			while ($row = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>$row[purpose]</td>";
				echo "<td>$row[description]</td>";
				echo "<td>$row[portfoliocode]</td>";
				echo "<td>$row[descrizione]</td>";
				echo "<td>$row[btc]</td>";
				echo "<td>$row[euro]</td>";
				echo "<td>$row[ethereum]</td>";
				echo "<td>$row[bitcoincash]</td>";
				echo "<td>$row[xrp]</td>";
				echo "<td>$row[litecoin]</td>";
				echo "<td>$row[dash]</td>";
				echo "</tr>";
			}
			echo "</table>";
		}
		else {
			echo "<p style='color:red'>You don't have any walletts, you have to add a new one!</p>";
			echo"<a href='addwallet.php' class='site-btn sb-gradients sbg-line '>Add your first wallet, $username!</a>";
			echo"<br>";
		}
        mysqli_close($connection);
        ?>
                    
				
			</div>
			<div class="about-img">
				<img src="img/about-img.png" alt="">
			</div>
		</div>
	</section>
	<!-- About section end -->


<?php include 'footer.php' ?>