<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="/crypto/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="/crypto/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="/crypto/css/themify-icons.css"/>
	<link rel="stylesheet" href="/crypto/css/animate.css"/>
	<link rel="stylesheet" href="/crypto/css/owl.carousel.css"/>
	<link rel="stylesheet" href="/crypto/css/style.css"/>


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
	

	<?php include 'menu.php' ?>

	

	<!-- Hero section -->
	<section class="hero-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 hero-text">
					<h2>Login in <span>Crypto</span></h2>
					<form method="post" action="login.php">
					

		<?php include('errors.php'); ?>
		

			<h3>Username</h3>
			<input type="text" class="heyy" name="username" >
			<br><br>
			<h3>Password</h3>
			<input type="password" class="heyy"name="password">
			<br><br>
		
			<button type="submit" class="btn site-btn sb-gradients" name="login_user">Login</button>
			<br><br>
		<h4>
			Not yet a member? <a href="register.php">Sign up now!</a>
		</h4>
	</form>
					
				
				</div>
				<div class="col-md-6">
					
					
										<img src="img/laptop.png" class="laptop-image" alt="">

					
					
					
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


<?php include 'facts.php' ?>
<?php include 'footer.php' ?>