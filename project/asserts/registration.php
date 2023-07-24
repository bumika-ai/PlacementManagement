<?php
include 'C:\xampp\htdocs\project\app\connect.php';

if(isset($_POST['submit']))
//The isset() function checks whether a variable is set, which means that it has to be declared and is not NULL. This function returns true if the variable exists and is not NULL, otherwise it returns false
{
	
	$USN=$_POST['usn'];
	$Name=$_POST['name'];
	$DOB=$_POST['dob'];
	$Email=$_POST['email'];
	$Phone=$_POST['phone'];
	$Password=$_POST['password'];
	$Conform_password=$_POST['con_password'];
	$Department=$_POST['department'];
	$GraduationYear=$_POST['year'];

	$usn_check="SELECT * FROM student1 WHERE USN=?";
	$usn_stmt=$conn->prepare($usn_check);
	$usn_stmt->bind_param("s",$USN);
	$usn_stmt->execute();
	$usn_stmt->store_result();

	if($usn_stmt->num_rows()>0)
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
		//template for sql query
		$sql="INSERT INTO  student1(USN, NAME,DOB,EMAIL, PASSWORD, PHONE, DEPARTMENT, GRADUATION) VALUES (?,?,?,?,?,?,?,?)";


		//preparing the statement
		$stmt=$conn->prepare($sql);//A prepared statement is a feature used to execute the same (or similar) SQL statements repeatedly with high efficiency.
		$stmt->bind_param("sssssssi",$USN,$Name,$DOB,$Email,$pass,$Phone,$Department,$GraduationYear);
		$result=$stmt->execute();

		if($result)
		{?><script type="text/javascript">alert("Registered sucessfully");</script>
		<?php 
		}
		else
		{?><script type="text/javascript">alert("Registration unsucessfully");</script>
		<?php  
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

<body><div class="bg_color"</div>
	<h3>Register Form</h3>
	<form onsubmit="return validate()" method="post" action="registration.php">
		
		<fieldset>
			<legend>Student_details</legend>
			<label for="usn">Usn:</label><br>
			<input type="text" id="usn" name="usn" placeholder="Enter your usn" required="required">
			<br><br>
			<label for="name">Name:</label><br>
			<input type="text"  id="name" name="name" placeholder="Enter your name" required="required">
			<br><br>
			<label for="dob">Date of birth:</label><br>
			<input type="date"  id="dob" name="dob" placeholder="Enter your DOB" required="required">
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
			<label for="department">Select your department</label><br>
			<select id="department" name="department" >
			<option value="select">select your department</option>
			<option value="cse">Computer science</option>
			<option value="ise">Information science</option>
			<option value="me">Mechanical engineering</option>
			<option value="tce">Telecommunication and engineering</option>
			<option value="eee">Electrical and electonics engineering</option>
			</select>
			<br><br>
			<label for="year">Graduation year:</label><br>
			<input type="number" id="year" name="year" step="1" min="2021" max="2030" value="2021">
			<br><br>
			<button type="submit" name="submit"><b>register<b></button>
			<button type="reset" name="clear"><b>reset<b></button>
			<br><br>
			<a class="second" href="login.php" target="_self" ">Already have an account?</a>
			<br>
		</fieldset>
	</form>
</body>
