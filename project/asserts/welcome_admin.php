<?php
session_start();
if(!isset($_SESSION['Admin'])){
	header("location:admin_login.php");

}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	
	
</head>
<body>
	<ul><li><a href="welcome_admin.php">Home</a></li>
		<li><a href="about.php">ABOUT US</a></li>
		<li><a href="internship_table.php">Internship offers</a></li>
		<li><a href="trial1.php">Student details</a></li>
		<li><a href="company_details.php">Company details</a></li>
		<li><a href="workshop_detail.php">workshop details</a></li>
		<li><a href="index.php">Modify</a></li>
		<li><a href="admin_logout.php">LOG OUT</a></li>
	</ul>
	<br>
<h1>WELCOME!</h1>
<h2><?php echo $_SESSION['Admin'];?></h2>

<a href="first.php" class="second">Back to main page</a>

</body>
</html>