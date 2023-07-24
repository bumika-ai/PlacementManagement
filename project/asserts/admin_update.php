<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit']))
{
	$ID=$_POST['ad_id'];
	$Password=$_POST['password'];
	$pass=password_hash($Password, PASSWORD_DEFAULT);

	$sql="SELECT * FROM admin WHERE ADMIN_ID=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("s",$ID);
	$result=$stmt->execute();
	$stmt->store_result();
	if($stmt->num_rows()>0){
		$sql="UPDATE admin SET PASSWORD=?  WHERE ADMIN_ID=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("ss",$pass,$ID);
		$result=$stmt->execute();
		echo("password changed successfully!");
		}
	else {
		echo("password changed unsuccessfully!");
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Forgot password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	
	
	<h3>Change Password</h3>
	<form action="admin_update.php" method="post" >
		<fieldset>
		<label for="ad_id">Admin_ID</label>
		<br>
		<input type="text" name="ad_id"   placeholder="Enter the your id" required="required">
		<br><br>
		<label for="password">password</label>
		<br>
		<input type="password" name="password" placeholder="Enter the password" required="required" >
		<br><br>
		<button type="submit" name="submit" id="submit"><b>Change password<b></button>
		<br><br><a href="admin_login.php">Back to login page</a>
		</fieldset>
	</form>
</body>
</html>