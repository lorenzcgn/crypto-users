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
	<title>Delete wallet</title>
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
			<h2>Delete wallet</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i> Delete wallets without loosing money </span>
			</div>
		</div>
	</section>
	<!-- Page info end -->


	<!-- About section -->
	<section class="about-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-6 about-text">
					<h5>We're moving your money from your old wallet.</h5>
                    <?php
		error_reporting (E_ALL ^ E_NOTICE);
		
			// variabili
			$portfoliocode = $_GET["portfoliocode"];
			$newportfoliocode = $_GET["newportfoliocode"];
			require_once "db.php";
			
			$check = "Select portfoliocode from walletts where portfoliocode = '$portfoliocode' OR portfoliocode = '$newportfoliocode'";
			$result = mysqli_query($connection, $check);
		    if(mysqli_num_rows($result) > 1) {

			if ($portfoliocode == $newportfoliocode || empty($newportfoliocode) == true){
				echo"<p style='color:red'>Why are you trying to change your wallet's purpose again to the same purpose?
				Or did you not select a new portfolio to move your money to?
				Are you trying to testing me? You shouldn't do that!</p>";
			}
			else{
				
				 /* create sql connection*/

$query = "Select btc FROM walletts WHERE portfoliocode = '$portfoliocode';";
$query .= "Select euro FROM walletts WHERE portfoliocode = '$portfoliocode';";
$query .= "Select ethereum FROM walletts WHERE portfoliocode = '$portfoliocode';";
$query .= "Select bitcoincash FROM walletts WHERE portfoliocode = '$portfoliocode';";
$query .= "Select xrp FROM walletts WHERE portfoliocode = '$portfoliocode';";
$query .= "Select litecoin FROM walletts WHERE portfoliocode = '$portfoliocode';";
$query .= "Select dash FROM walletts WHERE portfoliocode = '$portfoliocode'";

/* Execute queries */
echo "We've moved from your old wallet: ";


echo"<div class='container'>";
echo"<div class='row'>";

echo"<div class='col-1'>";


if (mysqli_multi_query($connection, $query)) {
do {
    /* store first result set */
    if ($result = mysqli_store_result($connection)) {
		
        while ($row = mysqli_fetch_array($result)) 

/* print  results */    
{
echo $row['btc'];
echo $row['euro'];
echo $row['ethereum'];
echo $row['bitcoincash'];
echo $row['xrp'];
echo $row['litecoin'];
echo $row['dash'];
echo"<br>";

}

mysqli_free_result($result);
}   
} while (mysqli_next_result($connection));
}

echo"</div>";
echo"<div class='col-1'>";

echo" bitcoin";
echo"<br>";
echo" euro";
echo"<br>";
echo" ethereum";
echo"<br>";
echo" bitcoincash";
echo"<br>";
echo" xrp";
echo"<br>";
echo" litecoin";
echo"<br>";
echo" dash";
echo"<br>";



echo"</div>";
echo"</div>";
echo"</div>";






				$query = "Select btc, euro, ethereum, bitcoincash, xrp, litecoin, dash FROM walletts where portfoliocode = '$portfoliocode'";
		$result = mysqli_query($connection, $query);
		if($result || mysqli_num_rows($result) == 0) {
			while ($row = mysqli_fetch_array($result)) {
				$oldbtc= $row['btc'];
				$oldeuro= $row['euro'];
$oldethereum= $row['ethereum'];
$oldbitcoincash= $row['bitcoincash'];
$oldxrp= $row['xrp'];
$oldlitecoin= $row['litecoin'];
$olddash= $row['dash'];
			}

		
		
		
		require_once "db.php";
		
$query = "UPDATE walletts SET walletts.btc=($oldbtc+walletts.btc) WHERE portfoliocode = '$newportfoliocode';";
$query .= "Select btc FROM walletts WHERE portfoliocode = '$newportfoliocode';";

$query .= "UPDATE walletts SET walletts.euro=($oldeuro+walletts.euro) WHERE portfoliocode = '$newportfoliocode';";
$query .= "Select euro FROM walletts WHERE portfoliocode = '$newportfoliocode';";

$query .= "UPDATE walletts SET walletts.ethereum=($oldethereum+walletts.ethereum) WHERE portfoliocode = '$newportfoliocode';";
$query .= "Select ethereum FROM walletts WHERE portfoliocode = '$newportfoliocode';";

$query .= "UPDATE walletts SET walletts.bitcoincash=($oldbitcoincash+walletts.bitcoincash) WHERE portfoliocode = '$newportfoliocode';";
$query .= "Select bitcoincash FROM walletts WHERE portfoliocode = '$newportfoliocode';";

$query .= "UPDATE walletts SET walletts.xrp=($oldxrp+walletts.xrp) WHERE portfoliocode = '$newportfoliocode';";
$query .= "Select xrp FROM walletts WHERE portfoliocode = '$newportfoliocode';";

$query .= "UPDATE walletts SET walletts.litecoin=($oldlitecoin+walletts.litecoin) WHERE portfoliocode = '$newportfoliocode';";
$query .= "Select litecoin FROM walletts WHERE portfoliocode = '$newportfoliocode';";

$query .= "UPDATE walletts SET walletts.dash=($olddash+walletts.dash) WHERE portfoliocode = '$newportfoliocode';";
$query .= "Select dash FROM walletts WHERE portfoliocode = '$newportfoliocode'";


if (mysqli_multi_query($connection, $query)) {
do {
    /* store first result set */
    if ($result = mysqli_store_result($connection)) {
		
        while ($row = mysqli_fetch_array($result)) 

/* print  results */    
{
echo" ";

}

mysqli_free_result($result);
}   
} while (mysqli_next_result($connection));
}
		
		
		$query = "DELETE FROM walletts where portfoliocode = '$portfoliocode'";
		$result = mysqli_query($connection, $query);
		
		}
		
		
		
		else {
			echo "<p style='color:red'>Your wallets are empty.</p>";
		}

				
				
								
				
				//$query = "UPDATE walletts SET btc= '$purpose' WHERE portfoliocode = '$portfoliocode'";
				
				
				//UPDATE walletts SET walletts.$cryptocurrency=($cryptocurrency+$quantity)
			/*	
			}
				
				
				
				
				$query2 = "SELECT purpose FROM walletts WHERE portfoliocode = '$portfoliocode'";
				$result2 = $connection->query($query);
				
				if($result2=$purpose){
					echo"Why are you trying to change your wallet's purpose again to the same purpose? Are you trying to testing me? You shouldn't do that!";
				}
				else{
				
			 $query = "UPDATE walletts SET purpose= '$purpose' WHERE portfoliocode = '$portfoliocode'";
				$connection->query($query);
				echo "You've changed purpose to $purpose of your wallett with this code: $portfoliocode";
				}
			}
			else {
				echo "Wallet with this code $portfoliocode isn't in the database. Have you written correctly the code?";
			}	*/
			
			}
			
			}
			else{
				echo"<p style='color:red'>Why are you trying to change your wallet's purpose again to the same purpose?
				Or did you not select a new portfolio to move your money to?
				Are you trying to testing me? You shouldn't do that!</p>";
			}
			
			mysqli_close($connection);
		?><br><br>
		
		<a class="site-btn sb-gradients sbg-line mt-5" href="delwallet.php">
			Delete other wallets.
		</a>
		<a class="site-btn sb-gradients sbg-line mt-5" href="portfolio.php">
			Go to the portfolio.
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