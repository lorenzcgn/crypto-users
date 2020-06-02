<?php 
	session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";
	$_SESSION['admin'] = "0";

	// connect to database
	require_once "db.php";

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = hash('sha512', $password_1);
			//$password = md5($password_1);
			$query = "INSERT INTO users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
			mysqli_query($connection, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "<p style='color:white'>You are now logged in</p></p>";
			header('location: dash.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = hash('sha512', $password);
			//$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($connection, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "<h4 style='color:white'>You are now logged in $username :)</h4>";
				
				
				
				
				$_SESSION['admin'] = '0';
		
		
		$query = "Select * FROM  users WHERE username = '$username' AND admin='1'";
		$result = mysqli_query($connection, $query);
		$numrows=mysqli_num_rows($result);
		
		
		
		if($numrows>0) {
			//unset($_SESSION['admin']);
    $_SESSION['admin'] = '1';
	$_SESSION['success']= "<h4 style='color:white'>You are now logged in and you are an admin $username.</h4>";

}


			header('location: dash.php');
				
				
				
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
		
	}
	
	

?>