<?php
include 'C:\xampp\htdocs\project\app\connect.php';

if(isset($_POST['submit']))
{
   
	$Company_id=$_POST['coid'];
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Phone=$_POST['phone'];

	$sql="SELECT * FROM company WHERE COMPANY_ID=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param("s",$Company_id);
	$result=$stmt->execute();
	$stmt->store_result();
	if($stmt->num_rows()>0)
	{
		$sql="UPDATE company SET COM_NAME=?,COM_EMAIL=?,PHONE=? WHERE COMPANY_ID=?";
		$stmt=$conn->prepare($sql);	
		$stmt->bind_param("ssss",$Name,$Email,$Phone,$Company_id);
		$result=$stmt->execute();
		if($result)
		{
		echo('Updated successfully');
		}
	}
	else
	{
		echo "Company doesn't exists";
	}
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Sign_up</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<link rel="stylesheet" type="text/css" href="nav.css">
	
</head>

<body>
	
	<div class="nav">
	<ul><li><a href="welcome_admin.php">HOME</a></li>
		<li><a href="about.php">ABOUT US</a></li>
		<li><a href="admin_logout.php">LOG OUT</a></li>
		<li><a href="index.php">Modify</a></li>
	</ul>
</div>
	<h3>Company uploads</h3>
	<form  method="post" action="update_company.php">
		
		<fieldset>

			<label for=coid>Company_ID</label><br>
			<input type="text" id="coid" name="coid" required="required" placeholder="Enter the Company_id"><br><br>

			<label for=name>Company name</label><br>
			<input type="text" id="name" name="name" required="required" placeholder="Enter the company name"><br><br>

			<label for=email>Company email</label><br>
			<input type="email" id="email" name="email" required="required" placeholder="Enter the Company email"><br><br>

			<label for=phone>phone_no</label><br>
			<input type="tel" id="phone" name="phone" required="required" placeholder="Enter the phone" maxlength="10"><br><br>

		

			<button type="submit" name="submit">Submit</button><br><br>
			<a href="add_internship.php">Internships provided</a>
		</fieldset>
	</form>
</body>