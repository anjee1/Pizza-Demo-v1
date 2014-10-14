<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang & Abdul Jabbar Group Project -->

<!--This page is only available to administrators, it will allow them to add a product
to the database-->
<head>
<title>Product Addition</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<!--side menu-->
	<div class="floating-menu">
	<a href="pizzeria.php">Pizzeria List</a>
	<a href="pizzaOption.php">Pizza Options</a>
	<a href="order.html">Order Pizza</a><br />
	<h3>Admin Account</h3>
	<a href="addPizzeria.html">Add Pizzeria</a><br />
	<h3>Site</h3>
	<a href ="store.php">Home</a>
	<a href="search.php">Search</a>
	<a href="about.html">About Us</a>
	<a href="contactUs.html">Contact</a>
	</div>
	<!--page heading-->
	<h1>Product Added</h1>
	<hr />
	
	<?php
		//assign new product values to variables
		$id = $_POST['id'];
		$name = $_POST['name'];
		$add = $_POST['add'];
		$num = $_POST['num'];
		$distance = $_POST['distance'];
				
		//Establish connection with MySQL database
		$con = mysql_connect("helios.ite.gmu.edu", "tchang4", "10Ratex21");
		if(mysql_errno($con) !=0){
			echo "Failed to connect to MySQL: " . mysql_errno($con);
		}
		mysql_query("show databases", $con);//show databases
		mysql_query("use tchang4", $con);//select tchang4 database
		//command to insert user input to PRODUCT table
		$sqlCom1 = "INSERT INTO Pizzaria VALUES('$id', '$name', '$add', '$num', '$distance')";
		
		$runCommand = mysql_query( $sqlCom1, $con );//execute command
		if(! $runCommand)
		{
			die('Could not enter user data: ' . mysql_error());//prints error information if a problem was encountered
		}else{
			echo "$name has been added successfully!";//print success statement
		}   
	?>
	<br /><br />
	<hr />
</body>
</html>


		