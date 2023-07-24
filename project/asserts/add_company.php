<?php
include 'C:\xampp\htdocs\project\app\connect.php';

if(isset($_POST['submit']))
{
   
	$Company_id=$_POST['coid'];
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Phone=$_POST['phone'];
	

	$id_check="SELECT * FROM company WHERE COMPANY_ID=?";
	$id_stmt=$conn->prepare($id_check);
	$id_stmt->bind_param('s',$Company_id);
	$id_stmt->execute();
	$id_stmt->store_result();
	if($id_stmt->num_rows()>0)
	{
		?>
		<script type="text/javascript">
			alert("Company exits");
		</script>
		 <?php
	}
	else
	{
		$sql="INSERT INTO  company(COMPANY_ID, COM_NAME,COM_EMAIL,PHONE) VALUES (?,?,?,?)";
		$stmt=$conn->prepare($sql);	
		$stmt->bind_param("ssss",$Company_id,$Name,$Email,$Phone);
		$result=$stmt->execute();
		if($result){
			?>
		<script type="text/javascript">
			alert("Company added successfully!");
		</script>
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
</head>

<body>
	<h3>Company uploads</h3>
	<form  method="post" action="add_company.php">
		
		<fieldset>

			<label for=coid>Company_ID</label><br>
			<input type="text" id="coid" name="coid" placeholder="Enter the Company_id"><br><br>

			<label for=name>Company name</label><br>
			<input type="text" id="name" name="name" placeholder="Enter the company name"><br><br>

			<label for=email>Company email</label><br>
			<input type="email" id="email" name="email" placeholder="Enter the Company email"><br><br>

			<label for=phone>phone_no</label><br>
			<input type="tel" id="phone" name="phone" placeholder="Enter the phone" maxlength="10"><br><br>

		

			<button type="submit" name="submit">Submit</button><br><br>
			<a href="add_internship.php">Internships provided</a>
		</fieldset>
	</form>
</body>