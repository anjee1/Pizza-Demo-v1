<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang & Stephanie Olson -->

<!-- This page will output the products in the laptop category-->
<head>
<title> Pizzeria </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<!--Side Menu-->
	<div class="floating-menu">
	<h3>Products</h3>
	<a href="pizzeria.php">Pizzeria List</a>
	<a href="pizzaOption.php">Pizza Options</a>
	<a href="order.html">Order Pizza</a><br />
	<h3>Customer Account</h3>
	<a href="login.html">Login</a>
	<a href="createAccount.html">New User</a><br />
	<h3>Site</h3>
	<a href="search.php">Search</a>
	<a href="about.html">About Us</a>
	<a href="contactUs.html">Contact</a>
	</div>
	<h1> Pizza </h1>
	<hr />
	<?php
		//Establish connection with MySQL database
		$con = mysql_connect("helios.ite.gmu.edu", "tchang4", "10Ratex21");
		if(mysql_errno($con) !=0){
			echo "Failed to connect to MySQL: " . mysql_errno($con);
		}
		mysql_query("show databases", $con);//show databases
		mysql_query("use tchang4", $con);//select tchang4 database
		

		$result = mysql_query("SELECT Name, Description, Price FROM Pizza", $con);
		echo "<br />";	
		//Output table header
		echo "<table border='1'>
		<tr>
		<th>Name</th>
		<th>Description</th>
		<th>Price</th>
		</tr>";
		$counter = 0;
		while($row = mysql_fetch_array($result)) {//fill rows with content
		echo "<tr>";
		echo "<td>" . $row['Name'] . "</td>";
		echo "<td>" . $row['Description'] . "</td>";
		echo "<td>$" . $row['Price'] . "</td>";
		echo "</tr>";
		}
		echo "</table>";
		echo "<br />";
		echo "<hr />";	
			
	?>
	
</body>
</html>