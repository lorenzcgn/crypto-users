<?php
// Start the session
session_start();
error_reporting(0);
if(!isset($_SESSION['username'])){
    header("Location: /crypto/login.php");
		exit();
}
require_once "db.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Portfolio</title>
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
	
	  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">



	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	  
	  	<link rel="stylesheet" href="https://ds.fusioncharts.com/2.0.8/css/ds.css">

	<script src="https://ds.fusioncharts.com/2.0.8/js/ds.js"></script>
	<script type="text/javascript" src="http://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	

	<![endif]-->

	<link rel="stylesheet" href="css/style.css"/>


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
			<h2>1 portfolio: ∞ wallets with different purposes!</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i>Crypto portfolio with all your wallets</span>
			</div>
			<div class="img">
				<img src="img/about-img.png" float="right" with="200px" >
			</div>
		</div>
	</section>
	
	<section class="about-section spad">
		
			<div class="container">
			<div class="container-fluid">
				
								<h2>Real-time prices</h2>
		<div class="row text-center mt-4 pl-3 pr-3">
			<div class="col-sm">
				<div class="card">
					<div class="card-body">
						<div class="h3">Bitcoin(BTC)</div>
						<div class="h5">(Price in EUR)</div>
						<div id="btc_val" class="h4 kpi-value"></div>
					</div>
				</div>
			</div>
			<div class="col-sm">
				<div class="card">
					<div class="card-body">
						<div class="h3">Litecoin(LTC)</div>
						<div class="h5">(Price in EUR)</div>
						<div id="ltc_val" class="h4 kpi-value"></div>
					</div>
				</div>
			</div>
			<div class="col-sm">
				<div class="card">
					<div class="card-body">
						<div class="h3">Ethereum</div>
						<div class="h5">(Price in EUR)</div>
						<div id="eth_val" class="h4 kpi-value"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
				<div class="col-lg-12 offset-lg-0">
					
				<br></br>
					
					
					
				<?PHP

				
		
		session_start();
		$username = $_SESSION['username'];
		echo "<h2>Welcome in your account $username, it's a pleasure having you here</h2>";

		echo "<br><h2>Total investments</h2>";
		echo"<h5>Total cryptocurrencies and money on your wallets.</h5>";
		

		$query = "Select COUNT(walletts.portfoliocode) as 'totalwalletts', COUNT(DISTINCT walletts.purpose) as 'totalpurposes', SUM(btc) as 'btc', SUM(euro) as 'euro', SUM(ethereum) as 'ethereum', SUM(bitcoincash) as 'bitcoincash', SUM(xrp) as 'xrp', SUM(litecoin) as 'litecoin' , SUM(dash) as 'dash'
		FROM  walletts INNER JOIN users ON users.username=walletts.username WHERE walletts.username = '$username'";
		$result = mysqli_query($connection, $query);
		if(mysqli_num_rows($result) == true) {
			echo "<table border>";
			echo "<tr>";
			echo "<th> total wallets</th>";
			echo "<th> total purposes</th>";
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
				echo "<td>$row[totalwalletts]</td>";
				echo "<td>$row[totalpurposes]</td>";
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
			
				echo "<br>";
				echo "<h1>All your wallets, $username!</h1>";
									echo"<h5>Here you can see all your wallets.</h5>";

				
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
						<br></br>
						
						<h1>Search</h1>
         <input type="text" name="search" id="search" autocomplete="off" placeholder="Search into all values!" class="heyy">
         <div id="output"></div>
						
						<br></br>

				<h1>What do you want to do?</h1>
				<br>
				  <div class="row align-items-start">

	
				<div class="col-4">
		<h2>Change your wallets</h2>


		<a href="addwallet.php" class="site-btn sb-gradients sbg-line mt-5">
		Add wallets.
	</a>
		<a href="delwallet.php" class="site-btn sb-gradients sbg-line mt-5">
		Delete wallets.
	</a>
			<a href="chwallet.php" class="site-btn sb-gradients sbg-line mt-5">
		Change your wallets.
	</a>
				
				</div>
			<div class="col-4">
			<h2>Purposes</h2>
		
			
			<a href="purposes.php" class="site-btn sb-gradients sbg-line mt-5">
		See all your purposes.
	</a>
	<a href="chpurpose.php" class="site-btn sb-gradients sbg-line mt-5">
		Change wallets' purposes.
	</a>
	<?php
					if ($_SESSION['admin'] == 1) {
			echo"<br></br>";
				echo"<h3>You're an admin $username, you can also change purposes ;)</h3>";
	echo"<a href='addpurpose.php' class='site-btn sb-gradients sbg-line '>Add a purpose.</a>";
	echo"<a href='delpurpose.php' class='site-btn sb-gradients sbg-line'>Delete a purpose.</a>";
	}
			
			?>
</div>    

			<div class="col-4">

		
		
				<h2>Online banking</h2>
	<a href="add.php" class="site-btn sb-gradients sbg-line mt-5">
		Add some cryptocurrencies to your portfolio.
	</a>
	<a href="del.php" class="site-btn sb-gradients sbg-line mt-5">
		Withdraw your cryptocurrencies now.
	</a>


			
        
 </div>
  <script type="text/javascript">
    $(document).ready(function(){
       $("#search").keyup(function(){
          var query = $(this).val();
          if (query != "") {
            $.ajax({
              url: 'search.php',
              method: 'POST',
              data: {query:query},
              success: function(data){

                $('#output').html(data);
                $('#output').css('display', 'block');

                $("#search").focusout(function(){
                    $('#output').css('display', 'block');
                });
                $("#search").focusin(function(){
                    $('#output').css('display', 'block');
                });
              }
            });
          } else {
          $('#output').css('display', 'block');
        }
      });
    });
  </script>
<script>
		//Fetch the price of Ethereum
		const eth_api_url = 'https://api.cryptonator.com/api/ticker/eth-eur';
		function ethereumHttpObject() {
			try { return new XMLHttpRequest(); }
			catch (error) { }
		}
		function ethereumGetData() {
			var request = ethereumHttpObject();
			request.open("GET", eth_api_url, false);
			request.send(null);
			console.log(request.responseText);
			return request.responseText;
		}
		function ethereumDataHandler() {
			var raw_data_string = ethereumGetData();

			var data = JSON.parse(raw_data_string);

			var base = data.ticker.base;
			var target = data.ticker.target;
			var price = data.ticker.price;
			var volume = data.ticker.volume;
			var change = data.ticker.change;
			var api_server_epoch_timestamp = data.timestamp;
			var api_success = data.success;
			var api_error = data.error;
			return price;
		}

		document.getElementById("eth_val").innerHTML = "€" + Math.round(ethereumDataHandler());
		


		//Fetch the price of Litecoin
		const ltc_api_url = 'https://api.cryptonator.com/api/ticker/ltc-eur';
		function litecoinHttpObject() {
			try { return new XMLHttpRequest(); }
			catch (error) { }
		}
		function litecoinGetData() {
			var request = litecoinHttpObject();
			request.open("GET", ltc_api_url, false);
			request.send(null);
			//console.log(request.responseText);	
			return request.responseText;
		}
		function litecoinDataHandler() {
			var raw_data_string = litecoinGetData();
			var data = JSON.parse(raw_data_string);
			var base = data.ticker.base;
			var target = data.ticker.target;
			var price = data.ticker.price;
			var volume = data.ticker.volume;
			var change = data.ticker.change;
			var api_server_epoch_timestamp = data.timestamp;
			var api_success = data.success;
			var api_error = data.error;
			return price;
		}
		document.getElementById("ltc_val").innerHTML = "€" + Math.round(litecoinDataHandler());

		//Fetch the value of Bitcoin
		const api_url = 'https://api.cryptonator.com/api/ticker/btc-eur';

		const time_interval = 2;
		function addLeadingZero(num) {
			return (num <= 9) ? ("0" + num) : num;
		}
		function clientDateTime() {
			var date_time = new Date();
			// var weekday = date_time.getDay();
			// var today_date = date_time.getDate();
			// var month = date_time.getMonth();
			// var full_year = date_time.getFullYear();
			var curr_hour = date_time.getHours();
			var zero_added_curr_hour = addLeadingZero(curr_hour);
			var curr_min = date_time.getMinutes();
			var curr_sec = date_time.getSeconds();
			var curr_time = zero_added_curr_hour + ':' + curr_min + ':' + curr_sec;
			return curr_time
		}
		function makeHttpObject() {
			try { return new XMLHttpRequest(); }
			catch (error) { }
		}
		function bitcoinGetData() {
			var request = makeHttpObject();
			request.open("GET", api_url, false);
			request.send(null);
			return request.responseText;
		}
		function bitcoinDataHandler() {
			var raw_data_string = bitcoinGetData();
			var data = JSON.parse(raw_data_string);
			var base = data.ticker.base;
			var target = data.ticker.target;
			var price = data.ticker.price;
			var volume = data.ticker.volume;
			var change = data.ticker.change;
			var api_server_epoch_timestamp = data.timestamp;
			var api_success = data.success;
			var api_error = data.error;
			return price;
		}

		document.getElementById("btc_val").innerHTML = "€" + Math.round(bitcoinDataHandler());

		FusionCharts.ready(function () {
			var fusioncharts = new FusionCharts({
				id: "stockRealTimeChart",
				type: 'realtimeline',
				renderAt: 'chart-container',
				width: '100%',
				height: '350',
				dataFormat: 'json',
				dataSource: {
					"chart": {
						"caption": "Bitcoin Ticker",
						"subCaption": "",
						"xAxisName": "Local Time",
						"yAxisName": "EUR",
						"numberPrefix": "$",
						"refreshinterval": "2",
						"slantLabels": "1",
						"numdisplaysets": "10",
						"labeldisplay": "rotate",
						"showValues": "0",
						"showRealTimeValue": "0",
						"theme": "fusion",
						"yAxisMaxValue": (bitcoinDataHandler().toString() + 20),
						"yAxisMinValue": (bitcoinDataHandler().toString() - 20),
					},
					"categories": [{
						"category": [{
							"label": clientDateTime().toString()
						}]
					}],
					"dataset": [{
						"data": [{
							"value": bitcoinDataHandler().toString()
						}]
					}]
				},
				"events": {
					"initialized": function (e) {
						function updateData() {
							// Get reference to the chart using its ID
							var chartRef = FusionCharts("stockRealTimeChart"),
								x_axis = clientDateTime(),
								y_axis = bitcoinDataHandler(),
								strData = "&label=" + x_axis + "&value=" + y_axis;
							// Feed it to chart.
							chartRef.feedData(strData);
						}
						e.sender.chartInterval = setInterval(function () {
							updateData();
						}, time_interval * 1000);
					},
					"disposed": function (evt, arg) {
						clearInterval(evt.sender.chartInterval);
					}
				}
			}
			);
			fusioncharts.render();
		});
	</script>
			
			
		</div>
		
		
		
		
	</section>
	<!-- About section end -->
  


<?php include 'footer.php' ?>



