<?php
include 'C:\xampp\htdocs\project\app\connect.php';
session_start();
if(isset($_POST['submit']))
{
	$USN=$_POST['usn'];
	$Password=$_POST['password'];

	$sql="SELECT USN,NAME,PASSWORD FROM student1 WHERE USN=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("s",$USN);
	$stmt->execute();

	$stmt->bind_result($db_usn,$db_name,$db_pass);
	if($stmt->fetch())
	{
		$_SESSION['Name']=$db_name;
		echo $_SESSION['Name'];
		$pass_decode = password_verify($Password, $db_pass);

		if($pass_decode){
			?><script type="text/javascript">alert("Incorrect Password")</script> <?php
			header("location:welcome.php");
		}else{
			?><script type="text/javascript">alert("Incorrect Password")</script> <?php
		}
	}else{
		echo "<br><br>Incorrect USN";
	}
}

?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>
	<h3>Login form</h3>
	<form action="login.php" method="post" >
		
		<fieldset>
		<legend>Student login</legend>
		<label for="usn">Usn</label>
		<br>
		<input type="text" name="usn"  required="required" placeholder="Enter the USN">
		<br><br>
		<label for="password">Password</label>
		<br>
		<input type="password" name="password"  placeholder="Enter the password">
		<br>
		</fieldset>
		<br><br>
		<button type="submit" name="submit" >SUBMIT</button><br><br>
		<a class="second" href="registration.php" ">Don't have account</a>
		<br>
		<a class="second" href="update.php">forget password?</a>
		
	</form>

</body>
</html>