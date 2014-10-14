<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang & Abdul Jabbar Group Project-->

<!--This page will allow a logged in user to edit their account information, the 
inputs will be sent to the changeAccount.php to process the changes-->
<head>
<title>Edit Account</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<!--Side Menu-->
	<div class="floating-menu">
	<?php
		$user = $_GET['userID'];//get user ID
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
		echo "<h1>Change Account Information</h1>";//page heading
		echo "<hr />";
		$user = $_GET['userID'];
		echo "<h3>Your Account Information</h3>";
		//Establish connection with MySQL database
		$con = mysql_connect("helios.ite.gmu.edu", "tchang4", "10Ratex21");
			
		if(mysql_errno($con) !=0){
			echo "Failed to connect to MySQL: " . mysql_errno($con);
		}
		mysql_query("show databases", $con);//show databases
		mysql_query("use tchang4", $con);//select tchang4 database
		
		//Command to select userID and username from ACCOUNT table
		$result = mysql_query("SELECT user_ID, username FROM ACCOUNT WHERE user_ID = $user", $con);
		echo "<br />";
		while($row = mysql_fetch_array($result)) {
			$id = $row['user_ID'];//assign User id to $id variable
			$un = $row['username'];//assign username to $un variable
		}
		echo "Account Number: &nbsp;&nbsp;&nbsp;<b>"."       " . $id."</b><br />";//outputs user ID
		$filler = str_repeat('&nbsp;', 17);
		echo "User ID: $filler<b>" ."       ". $un." </b>" ;//outputs username
		$url = 'changeAccount.php?id='.$id;
	?>

	<p>Please edit the account information you wish to change below:</p>
	<!-- Form for user to user to change account information as desired-->
		<form action="<?php echo $url ?>" method="post">
			Password <input type="password" name="pw"  size="50" /><br />
			<h4>Your Personal Information</h4>
			First Name <input type="text" name="fname"  size="20"/><br />
			Last Name <input type="text" name="lname"  size="20"/><br />
			Address 1<input type="text" name="add1"  size="45"/><br />
			Address 2 <input type="text" name="add2"  size="45"/><br />
			City <input type="text" name="city"  size="25"/><br />
			State <input type="text" name="state"  size="2"/><br />
			Zip <input type="text" name="zip"  size="10"/><br />
			Email <input type="text" name="email"  size="40"/><br />
			Phone <input type="text" name="phone"  size="13"/><br />
			<h4>Your Payment Information</h4>
			Card Type <select name="type" >
				<option>Visa</option>
				<option>Mastercard</option>
				<option>Amex</option>
				<option>Discover</option>
			</select><br />
			Card Number <input type="text" name="cardNum"  size="50"/><br />
			Card Expiration <input type="text" name="expDate"  size="5"/><br />
			<br />
			<!--Send inputs to changeAccount.php-->
			<input type="submit" value="Update Account"/>
			<!--Clear form-->
			<input type="reset" value="Reset Form" />
		</form>
		<hr />
</body>
</html>
