<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- IT207 C01 Tetis Chang & Abdul Jabbar Group Project-->

<!-- This page will take user inputs for changing their account information and make the changes to the table in the database-->
<head>
<title> Account Changes </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
	<div class="floating-menu">
	<?php
	$user = $_GET['id'];
	$link = 'editAccount.php?userID='.$user;
	//side menu
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
	echo "<h1>Account Information Changes</h1>";//page heading
	echo "<hr />";
		
		$counter = 0;//see if there were no changes made

		/*Check to see which fields have been filled by user and assign to variables*/
		if("" != trim($_POST['pw'])){
			$pword = $_POST['pw'];$counter++;	} 
		if("" != trim($_POST['fname'])){
			$fname = $_POST['fname'];$counter++;	} 	
		if("" != trim($_POST['lname'])){
			$lname = $_POST['lname'];$counter++;	}
		if("" != trim($_POST['add1'])){
			$add1 = $_POST['add1'];$counter++;	}
		if("" != trim($_POST['add1'])){
			$add2 = $_POST['add2'];$counter++; } 
		if("" != trim($_POST['city'])){
			$city = $_POST['city'];	$counter++; }	
		if("" != trim($_POST['state'])){
			$state = $_POST['state'];$counter++; }
		if("" != trim($_POST['zip'])){
			$zip = $_POST['zip'];$counter++; }
		if("" != trim($_POST['email'])){
			$email = $_POST['email'];$counter++;	}
		if("" != trim($_POST['phone'])){
			$phone = $_POST['phone'];$counter++;	}
		$cardType = $_POST['type'];
		if("" != trim($_POST['cardNum'])){
			$cardNum = $_POST['cardNum'];$counter++;	}
		if("" != trim($_POST['expDate'])){
			$cardExp = $_POST['expDate'];$counter++;
		}
		
		//set up connection with table in MySQL database
		$con = mysql_connect("helios.ite.gmu.edu", "tchang4", "10Ratex21");
		if(mysql_errno($con) !=0){
			echo "Failed to connect to MySQL: " . mysql_errno($con);
		}
		mysql_query("show databases", $con);//show databases
		mysql_query("use tchang4", $con);//select tchang4 database
		
		/*if user changed the field, the correct code will execute to replace the account information on selected fields*/
		if(isset($pword)){
			$result = mysql_query("UPDATE ACCOUNT SET password='$pword' WHERE user_ID=$user", $con);}
		if(isset($fname)){
			$result = mysql_query("UPDATE USER SET user_fname='$fname' WHERE user_ID=$user", $con);}
		if(isset($lname)){
			$result = mysql_query("UPDATE USER SET user_lname='$lname' WHERE user_ID=$user", $con);}
		if(isset($add1)){
			$result = mysql_query("UPDATE USER SET add1='$add1' WHERE user_ID=$user", $con);}
		if(isset($add2)){
			$result = mysql_query("UPDATE USER SET add2='$add2' WHERE user_ID=$user", $con);}
		if(isset($city)){
			$result = mysql_query("UPDATE USER SET city='$city' WHERE user_ID=$user", $con);}
		if(isset($state)){
			$result = mysql_query("UPDATE USER SET state='$state' WHERE user_ID=$user", $con);}
		if(isset($zip)){
			$result = mysql_query("UPDATE USER SET zip='$zip' WHERE user_ID=$user", $con);}
		if(isset($email)){
			$result = mysql_query("UPDATE USER SET email='$email' WHERE user_ID=$user", $con);}
		if(isset($phone)){
			$result = mysql_query("UPDATE USER SET phone='$phone' WHERE user_ID=$user", $con);}
		if(isset($cardType)){
			$result = mysql_query("UPDATE USER SET card_type='$cardType' WHERE user_ID=$user", $con);}
		if(isset($cardNum)){
			$result = mysql_query("UPDATE USER SET card_num='$cardNum' WHERE user_ID=$user", $con);}
		if(isset($expDate)){
			$result = mysql_query("UPDATE USER SET card_exp='$expDate' WHERE user_ID=$user", $con);}
		
		//prints statement stating requested changes were made 
		echo "<br /><br />";
		if ($counter > 0){
			echo "The requested changes has been made to your account.";
		}else{
			echo "No changes selected, so there have been no changes made to your account.";
		}
	?>
	<br /><br /><br /><br /><br /><br /><hr />
</body>
</html>