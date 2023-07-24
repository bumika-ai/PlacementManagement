<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit']))
{
	
	$ID=$_POST['ad_id'];
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Phone=$_POST['phone'];
	$Password=$_POST['password'];
	$Conform_password=$_POST['con_password'];

	$id_check="SELECT * FROM admin WHERE ADMIN_ID=?";
	$id_stmt=$conn->prepare($id_check);
	$id_stmt->bind_param('s',$ID);
	$id_stmt->execute();
	$id_stmt->store_result();

	if($id_stmt->num_rows()>0)
	{
		?>
		<script type="text/javascript">
			alert("User Already registered");
		</script>
		 <?php
	}
	else
	{
		$pass=password_hash($Password, PASSWORD_DEFAULT);
		$sql="INSERT INTO  admin(ADMIN_ID, NAME,EMAIL_ID, PASSWORD, PHONE) VALUES (?,?,?,?,?)";
		$stmt=$conn->prepare($sql);		
		$stmt->bind_param("sssss",$ID,$Name,$Email,$pass,$Phone);
		$result=$stmt->execute();
		if($result)
		{
			header("location:admin_login.php");
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Sign_up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
		<script type="text/javascript">
		function validate() 
		{
			var pwd1=document.getElementById("password");
			var pwd2=document.getElementById("con_password");
			var phno=document.getElementById("phone");

			if(phno.value.length!=10)
					{
						alert("Enter correct phone number")
						return false;
					}
			else
			{
				if(pwd1.value.length<6)
				{
					alert("password is small")
					return false;
				}
				else
				{
					if(pwd1.value!=pwd2.value)
					{
						alert("password do not match Re-enter the password");
						return false;
					}
					else
					{
						return true;
					}
				}
			}
		}

	</script>
</head>

<body>
	<h3>Register Form</h3>
	<form onsubmit="return validate()" method="post" action="admin_registration.php">
		
		<fieldset>
			<legend>Admin_details</legend>
			<label for="ad_id">Admin_ID</label><br>
			<input type="text" id="ad_id" name="ad_id" placeholder="Enter your id" required="required">
			<br><br>
			<label for="name">Admin_Name:</label><br>
			<input type="text"  id="name" name="name" placeholder="Enter your name" required="required">
			<br><br>
			<label for="email">E-mail:</label><br>
			<input type="email" id="email" name="email" placeholder="Enter your email" required="required">
			<br><br>
			<label for="phone">Phone_no:</label><br>
			<input type="phone" id="phone" name="phone" placeholder="Enter your phone_no">
			<br><br>
			<label for="password">Password:</label><br>
			<input type="password" name="password" id="password" placeholder="Enter your password" >
			<br><br>
			<label for="con_pass">Confirm_password:</label><br>
			<input type="password" name="con_password" id="con_password" placeholder="Re-enter password" >
			<br><br>
			<button type="submit" name="submit"><b>register<b></button>
			<button type="reset" name="clear"><b>reset<b></button>
			<br><br>
			<a class="second" href="admin_login.php" target="_self" ">Already have an account?</a>
			<br>
		</fieldset>
	</form>
</body>