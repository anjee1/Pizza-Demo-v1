<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang & Abdul Jabbar Group Project-->

<!--This site open if a user's login information is verified. In addition
this site will only open for registered users. -->
<head>
<title>User Access</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<!--Side Menu-->
	<div class="floating-menu">
	<?php
		$user = $_GET['userID'];
		$link = 'editAccount.php?userID='.$user;
		echo "<h3>Products</h3>";
		echo "<a href=laptops.php>Laptops</a>";
		echo "<a href=tablet.php>Tablet</a>";
		echo "<a href=accessories.php>Accessories</a><br />";
		echo "<h3>User Account</h3>";
		echo "<a href='$link'>Account Information</a>";
		echo "<br /><h3>Site</h3>";
		echo "<a href=search.php>Search</a>";
		echo "<a href=about.html>About Us</a>";
		echo "<a href=contactUs.html>Contact</a>";
	?>
	</div>
	<?php
		echo "<h1>User Site</h1>";//output page heading
		echo "<hr />";

		$user = $_GET['userID'];//get userID from logCheck.php to find and print user's name
		
		//Establish connection with MySQL database
		$con = mysql_connect("helios.ite.gmu.edu", "tchang4", "10Ratex21");
		if(mysql_errno($con) !=0){
			echo "Failed to connect to MySQL: " . mysql_errno($con);
		}
		mysql_query("show databases", $con);//show databases
		mysql_query("use tchang4", $con);//select tchang4 database
		
		//command to select records where user_ID is the user's
		$result = mysql_query("SELECT user_ID, user_fname, user_lname from USER WHERE user_ID = $user", $con);
		while($row = mysql_fetch_array($result)) {
			$fname = $row['user_fname'];
			$lname = $row['user_lname'];
		}
		echo "<br /><br />";
		echo "Welcome, $fname $lname.<br /><br /><br />";
	?>
	<br /><br />
	<hr />
</body>
</html>


		