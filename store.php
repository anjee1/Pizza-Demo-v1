<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang & Abdul Jabbar Group Project-->

<!-- This page is the homepage of Eureka Computer Store-->
<head>
<title> Home </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<!--Side Menu-->
	<div class="floating-menu">
	<a href="pizzeria.php">Pizzeria List</a>
	<a href="pizzaOption.php">Pizza Options</a>
	<a href="order.html">Order Pizza</a><br />
	<h3>Customer Account</h3>
	<a href="login.html">Login</a>
	<a href="createAccount.html">New User</a><br />
	<h3>Site</h3>
	<a href ="store.php">Home</a>
	<a href="search.php">Search</a>
	<a href="about.html">About Us</a>
	<a href="contactUs.html">Contact</a>
	</div>
	<!-- HomeScreen-->
	<?php
	echo "<h1>" ."Home". "</h1>";
	echo "<hr />";
	echo "Welcome to Pizza Poachers!";	
	echo "<br />";
	echo "Your destination for pizza delivery.";
	echo "<br />";
	?>
</body>
</html>