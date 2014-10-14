<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang & Abdul Jabbar Group Project-->

<!--This site will verify the login fields. If the user is verified as 
the admin, the user will be redirected to the admin site. If the user is 
verified as a registered user, the user will be redirected to the user 
site. If the account is not verified, then an error message will display-->
<head>
<title> Login Verification </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<!--Side Menu-->
	<div class="floating-menu">
	<h3>Products</h3>
	<a href="laptops.php">Laptops</a>
	<a href="tablet.php">Tablet</a>
	<a href="accessories.php">Accessories</a><br />
	<h3>Customer Account</h3>
	<a href="login.html">Login</a>
	<a href="createAccount.html">New User</a><br />
	<h3>Site</h3>
	<a href="search.php">Search</a>
	<a href="about.html">About Us</a>
	<a href="contactUs.html">Contact</a>
	</div>
		
	<?php
		//assigns user input to variables $un and $pw if fields are not empty
		if(isset($_POST['username']) && isset($_POST['password'])){
			$un = $_POST["username"];
			$pw = $_POST["password"];
		}
		//open connection with MySQL database my table
		$con = mysql_connect("helios.ite.gmu.edu", "tchang4", "10Ratex21");
		if(mysql_errno($con) !=0){
			echo "Failed to connect to MySQL: " . mysql_errno($con);
		}
		mysql_query("show databases", $con);//show databases
		mysql_query("use tchang4", $con);//select tchang4 database
		
		//find userID that corresponds to the given username and password
		$result = mysql_query("SELECT user_ID from ACCOUNT WHERE username = '$un' AND password = '$pw'", $con);
		if($result){
			if(mysql_num_rows($result) == 0){
				$foundUser = 0;//if user is not found
			}
			else{
				while($row = mysql_fetch_array($result)) {
					$foundUser = $row['user_ID'];//assings user_ID to $foundUser
				}
			}
		}

		if($foundUser > 1){
			// Redirect browser to user page if login is verified
			header("Location: regularAccess.php?userID=$foundUser"); 
		}elseif($foundUser == 1){
			//If user is verified as admin, user will be redirected to admin page
			header("Location: adminAccess.php?userID=$foundUser");
		}else{//Prints error message if user is not found
			echo "<h1>" . "Sign-in Error!" . "</h1>";
			echo "<hr />";
			echo "<br />";
			echo "The username and password does not match. Please try again or create an account for new members.";
			echo "<br /><br />";
			echo "<a href=login.html>Click here to sign in again</a><br />";
			echo "<a href=createAccount.html>Click here to create a new account</a><br />";
			echo "<br />";
			echo "<hr />";
		}
	?>
</body>
</html>