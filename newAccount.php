<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang Group Project-->

<!--This page will take the user input given in createAccount.html 
It will verify that the user does not already exist. If they do not exist, a new
record will be created in MySQL, else a error message will print -->
<head>
<title> New Account </title>
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
	<h1>Account Created</h1>
	<hr />

	<?php
		//store user input into variables
		$user = $_POST['un'];
		$pword = $_POST['pw'];
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$add1 = $_POST['address1'];
		if("" == trim($_POST['address2'])){//assigns null to address 2 if there was no input
			$add2 = 'null';
		}   
		$add2 = $_POST['address2'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$zip = $_POST['zip'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$cardType = $_POST['cardType'];
		$cardNum = $_POST['cardNum'];
		$cardExp = $_POST['expDate'];
		
		$pt1 = 0;
		
		//access MySQL database 
		$con = mysql_connect("helios.ite.gmu.edu", "tchang4", "10Ratex21");
		if(mysql_errno($con) !=0){
			echo "Failed to connect to MySQL: " . mysql_errno($con);
		}
		mysql_query("show databases", $con);//show databases
		mysql_query("use tchang4", $con);//select tchang4 database
		
		//Command to insert user data into the USER table in MySQL
		$sqlCom1 = "INSERT INTO USER VALUES(null, '$fname', '$lname', '$add1', 
		'$add2', '$city', '$state', '$zip', '$email', '$phone', '$cardType', 
		'$cardNum', '$cardExp')";
		
		//verify that user does not already exist
		$check = mysql_query("SELECT user_ID FROM USER WHERE user_fname = '$fname' AND user_lname = '$lname' AND email = '$email'", $con);
		if(mysql_num_rows($check) == 0) 
		{
			$runCommand = mysql_query( $sqlCom1, $con);
			$pt1++;
		}else{
			die('This user exists already.');
		}
		//if user exists process record for ACCOUNT table
		$result = mysql_query("SELECT user_ID from USER WHERE user_fname = '$fname' AND user_lname = '$lname'", $con);

		while($row = mysql_fetch_array($result)) {
			$userID = $row['user_ID'];
		}
		settype($userID, "integer");	
		//Command to insert username and password into ACCOUNT table
		$runCommand2 = mysql_query("INSERT INTO ACCOUNT VALUES('$user', '$pword', $userID)", $con);
		if(! $runCommand2)
		{
			die('Could not enter account data: ' . mysql_error());
		}else{
			if($pt1 == 1){
				echo "<br /><br />";
				echo "<h2>" . "Account Successfully Created!!" . "</h2><br />";
			}
		}  
		echo "<hr />";
	?>
</body>
</html>