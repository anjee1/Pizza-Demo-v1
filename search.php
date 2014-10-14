<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang & Stephanie Olson Group Project-->

<head>
<title> Search </title>
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
	<h1>Search</h1>
	<hr />
	<!--Form to get user inputs of things to search 
	User can search by category, price or both-->
	<form id="form1" name="form1" method="post" action=""> 
		<br />
		<!--Distance Type <select name="type" >
			<option>None</option>
			<option>1 mile radius</option>
			<option>3 mile radius</option>
			<option>>5 mile radius</option>
			</select><br /><br />-->
		Price <select name="price" >
			<option value="0">None</option>
			<option value="1">$0 - $10.00</option>
			<option value="2">$10.00 - $20.00</option>
			<option value="3">+$20.00</option>
			</select><br /><br />
		<input type="submit" name="submit" />
	</form>
	<br /><hr />
	<?php
		//run only if user clicks on the submit button
		if(isset($_POST['submit'])){
			//$prodType = strtolower($_POST["type"]);
			$price = $_POST["price"];
			settype($price, "float");
			
			//makes sure that at least one fields is not blank
			if($price != '0'){
			//if($prodType != 'none' || $price != '0'){
				echo "<h3>Results</h3>";
				//access MySQL database 
				$con = mysql_connect("helios.ite.gmu.edu", "tchang4", "10Ratex21");
				if(mysql_errno($con) !='0'){
					echo "Failed to connect to MySQL: " . mysql_errno($con);
				}
				mysql_query("show databases", $con);//show databases
				mysql_query("use tchang4", $con);//select tchang4 database
				
				//assign min and max for prices based on user input if only price is selected
				if ($price != 0){
				//if($prodType == 'none' && $price != 0){
					switch($price){
						case 1:$result = mysql_query("SELECT Name, Description, Price FROM 
							   Pizza WHERE Price BETWEEN 0 AND 10.00", $con);
							   break;
						case 2:$result = mysql_query("SELECT Name, Description, Price FROM 
							   Pizza WHERE Price BETWEEN 10.00 AND 20.00", $con);
							   break;
						case 3:$result = mysql_query("SELECT Name, Description, Price FROM 
							   Pizza WHERE Price > 20.00", $con);
							   break;
					}
				}
				/*
				//if only product type is selected, determines command
				if($prodType != 'none' && $price == 0){
					$result = mysql_query("SELECT Name, Description, Price FROM Pizza WHERE 
					Distance = '$prodType'", $con);
				}
				//if both fields are selected, determines command 
				if($prodType != 'none' && $price != 0){	
					switch($price){
					case 1:$result = mysql_query("SELECT prod_make, prod_model, prod_desc, prod_price FROM 
						   PRODUCT WHERE prod_type = '$prodType' AND prod_price BETWEEN 0.00 AND 99.00", $con);
						   break;
					case 2:$result = mysql_query("SELECT prod_make, prod_model, prod_desc, prod_price FROM 
						   PRODUCT WHERE prod_type = '$prodType'AND prod_price BETWEEN 100.00 AND 499.00", $con);
						   break;
					case 3:$result = mysql_query("SELECT prod_make, prod_model, prod_desc, prod_price FROM 
						   PRODUCT WHERE prod_type = '$prodType' AND prod_price BETWEEN 500.00 AND 999.00", $con);
						   break;
					case 4:$result = mysql_query("SELECT prod_make, prod_model, prod_desc, prod_price FROM 
						   PRODUCT WHERE prod_type = '$prodType' AND prod_price > 1000.00", $con);
						   break;
					}	
				}
				*/
				if(mysql_num_rows($result) > 0) {
				//print out table with product name, model, description and price
					echo "<br />";	
					echo "<table border='1'>
					<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					</tr>";
					while($row = mysql_fetch_array($result)) {//outputs contents into rows
					echo "<tr>";
					echo "<td>" . $row['Name'] . "</td>";
					echo "<td>" . $row['Description'] . "</td>";
					echo "<td>$" . $row['Price'] . "</td>";
					echo "</tr>";
					}
					echo "</table>";
					echo "<br />";
					echo "<hr />";
				}else{
					echo "There are no records that fit that criteria";//if no records exist print error message
				}
			}
		}
	?>
</body>
</html>