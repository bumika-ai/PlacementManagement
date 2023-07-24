<?php
session_start();
if(!isset($_SESSION['Name'])){
	header("location:login.php");

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
	<ul>
		<li><a href="welcome.php">HOME</a></li>
		<li><a href="update.php">UPDATE</a></li>
		<li><a href="internship_table.php">INTERNSHIP</a></li>
		<li><a href="company_details.php">COMPANY</a></li>
		<li><a href="workshop_detail.php">WORKSHOP</a></li>
		<li><a href="logout.php">LOG OUT</a></li>
	</ul>
<h1>WELCOME!</h1>
<h2><?php echo $_SESSION['Name'];?></h2>
<a  class="second" href="first.php">Back to main page</a>
</body>
</html>