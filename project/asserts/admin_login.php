<?php
include 'C:\xampp\htdocs\project\app\connect.php';
session_start();
if(isset($_POST['submit']))
{
	$ID=$_POST['ad_id'];
	$Password=$_POST['password'];
	$sql="SELECT ADMIN_ID,NAME,PASSWORD FROM admin WHERE ADMIN_ID=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("s",$ID);
	$stmt->execute();
	$stmt->bind_result($db_id,$db_name,$db_pass);
	if($stmt->fetch())
	{
		$_SESSION['Admin']=$db_name;
		echo $_SESSION['Admin'];
		$pass_decode = password_verify($Password, $db_pass);

		if($pass_decode){
			echo "<br><br>Login successful";
			header("location:welcome_admin.php");
		}else{
			echo "<br><br>Incorrect Password";
		}
	}else{
		echo "<br><br>Incorrect ID";
	}
}


	?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Admin login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h3>Admin login</h3>
	<form method='post' action='admin_login.php'>
		<fieldset>
			<label for="ad_id">Admin_ID</label><br>
				<input type="text" name="ad_id" placeholder="Enter your id"><br><br>
		<label for=name>Admin_Password</label><br>
		<input type="password" name="password" placeholder="Enter your password"><br><br>
		<button type="submit" name="submit" >SUBMIT</button>
		<br>
		<a class="second" href="admin_registration.php" ">Don't have account?</a>
		<br>
		<a class="second" href="admin_update.php">forget password?</a>

		</fieldset>


</body>
</html>