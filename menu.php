<!-- menu definitivo -->
	<header class="header-section clearfix">
		<div class="container-fluid">
			<a href="index.php" class="site-logo">
				<img src="img/logo.png" alt="">
			</a>
			<div class="responsive-bar"><i class="fa fa-bars"></i></div>
			<a href="login.php" class="user"><i class="fa fa-user"></i></a>
      <?php
					if (!isset($_SESSION['username'])) {
			echo"<a href='login.php' class='site-btn'>Login/Register</a>";
	}
			else{
        echo"<a href='index.php?logout='1'' class='site-btn'>Logout</a>";
      }
			?>
			
			<nav class="main-menu">
				<ul class="menu-list">
					<li><a href="dash.php">Dashboard</a></li>
					<li><a href="portfolio.php">Your wallets</a></li>
					<li><a href="editwallets.php">Edit wallets</a></li>
					<li><a href="add.php">Deposit</a></li>
           <li><a href="del.php">Withdraw</a></li>
					 <li><a href="purposes.php">Purposes</a></li>
					<li><a href="blog.php">Blog</a></li>
          <li><a href="about.php">About</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- menu -->