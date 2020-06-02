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
	<title>Purposes</title>
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
<style>
	
::-webkit-input-placeholder { /* Edge */
  color: white;
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: white;
}

::placeholder {
  color: white;
}
	
	input#search.heyy, input#search.heyy:hover{
	position: relative;
	background: linear-gradient(to right, #3e2bce 0%, #2dd3aa 100%, #2dd3aa 100%, #2dd3aa 100%);
	display: inline-block;
	padding: 15px 30px;
	font-size: 16px;
	font-weight: 500;
	line-height: 16px;
	border-radius: 50px;
	font-family: "Futura", sans-serif;
	min-width: 170px;
	text-align: center;
	border: 2px solid #7ad4cc;
	cursor: pointer;
	color: #fff;
	}



	table {
    background: linear-gradient(to right, #3e2bce 0%, #2dd3aa 100%, #2dd3aa 100%, #2dd3aa 100%);
    color: #fff;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 6px 14px 0 rgba(33,35,68,.1)!important;
    border: none;
    border-collapse: collapse;
}
	th {
    text-align: inherit;
    font-weight: bolder;
    font-size: 1rem;
    text-transform: uppercase;
	padding: 20px;
}

td {
    align-content: center;
    padding: 4px;
}

.card {
    border-collapse: collapse;
    background: linear-gradient(to right, #3e2bce 0%, #2dd3aa 100%, #2dd3aa 100%, #2dd3aa 100%);
    color: #fff;
    padding: 10px;
}

.navbar-dark {
    background-color: #4670ad;
    box-shadow: 0 2px 4px 0 rgba(0,0,0,.04);
    min-height: 65px;
}

.logo {
    color: #FFFFFF;
    font-weight: 500;
    text-transform: capitalize;
}

.card {
   border-radius: 5px;
   box-shadow: 0 6px 14px 0 rgba(33,35,68,.1)!important;
}

.kpi-value {
    font-weight: 500 !important;
}
.menu-list li a {
    color: #222;
}

</style>
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
			<h2>Purposes</h2>
			<div class="site-beradcamb">
				<a href="">Home</a>
				<span><i class="fa fa-angle-right"></i>Purposes of wallets</span>
			</div>
			<div class="img">
				<img src="img/about-img.png" float="right" with="200px" >
			</div>
		</div>
	</section>
	
	<section class="about-section spad">
		<div class="container">
			<div class="container-fluid">
				<h2>All purposes</h2>
				<br>
				  <div class="row align-items-start">

	
				<div class="col-8">
					<?PHP
					//error_reporting(0);

    require_once "db.php";
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
			echo "<p style='color:red'>No purposes found.</p>";
		}
			
		echo "<br>";
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
		echo"</div>";
		echo"<div class='col-4'>";
			if ($_SESSION['admin'] == 1) {
			
				echo"<h3>You're an admin $username, you can change purposes ;)</h3>";
	echo"<a href='addpurpose.php' class='site-btn sb-gradients sbg-line mt-5'>Add a purpose.</a>";
	echo"<a href='delpurpose.php' class='site-btn sb-gradients sbg-line mt-5'>Delete a purpose.</a>";
	}
	mysqli_close($connection);
?>
				
				<a href="chpurpose.php" class="site-btn sb-gradients sbg-line mt-5">
		Change purposes of wallets.
	</a>

			
			<br></br><br></br>

			<h3>Search</h3>
         <input type="text" name="search" id="search" autocomplete="off" placeholder="Search into all values!" class="heyy">
         <div id="output"></div>
				 
			
		</div>
 
  <script type="text/javascript">
    $(document).ready(function(){
       $("#search").keyup(function(){
          var query = $(this).val();
          if (query != "") {
            $.ajax({
              url: 'searchpurposes.php',
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

			
			
		</div>
		
		
		
		
	</section>
	<!-- About section end -->




<?php include 'facts.php' ?>
<?php include 'footer.php' ?>