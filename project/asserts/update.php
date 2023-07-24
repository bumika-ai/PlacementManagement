<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit']))
{
	$USN=$_POST['usn'];
	$Password=$_POST['password'];
	$pass=password_hash($Password, PASSWORD_DEFAULT);

	$sql="SELECT * FROM student1 WHERE USN=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("s",$USN);
	$result=$stmt->execute();
	$stmt->store_result();
	if($stmt->num_rows()>0)
	{
		$sql="UPDATE student1 SET PASSWORD=?  WHERE USN=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("ss",$pass,$USN);
		$result=$stmt->execute();
		if($result){
			?>
		<script type="text/javascript">
			alert("password changed successfully!");
		</script>
		<?php
	}
	}
	else
	{
			?>
		<script type="text/javascript">
			alert("Student usn does not exists");
		</script>
		<?php
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
	<form action="update.php" method="post" >
		<fieldset>
		<label for="usn">Usn</label>
		<br>
		<input type="text" name="usn"   placeholder="Enter the USN" required="required">
		<br><br>
		<label for="password">password</label>
		<br>
		<input type="password" name="password" placeholder="Enter the password" required="required" >
		<br><br>
		<button type="submit" name="submit" id="submit"><b>Change password<b></button>
		<br><br><a href="login.php">Back to login page</a>
		<br><a href="welcome.php">Back to home page</a>
		</fieldset>
	</form>
</body>
</html>