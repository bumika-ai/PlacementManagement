<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit']))
{
	$Workshop_id=$_POST['woid'];
	$Workshop_name=$_POST['woname'];
	$Company_id=$_POST['coid'];
	$Description=$_POST['desc'];
	$Skill=$_POST['skill'];
	$Start_date=$_POST['start'];
	$Timing=$_POST['time'];

	$Id_check="SELECT * FROM workshop WHERE WORKSHOP_ID=?";
	$Id_stmt=$conn->prepare($Id_check);
	$Id_stmt->bind_param("s",$Workshop_id);
	$Id_stmt->execute();
	$Id_stmt->store_result();
	if($Id_stmt->num_rows()>0)
	{
		$sql="UPDATE workshop SET WORKSHOP_NAME=?,COMPANY_ID=?,DESCRIPTION=?,SKILLS=?,START_DATE=?,TIMING=? WHERE WORKSHOP_ID=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("sssssss",$Workshop_name,$Company_id,$Description,$Skill,$Start_date,$Timing,$Workshop_id);
		$result=$stmt->execute();
		if($result)
		{?><script type="text/javascript">
			alert("Updated sucessfully");</script><?php
		}
	}
	else
	{
			?>
		<script type="text/javascript">
			alert("workshop_id does not exists");
		</script>
		<?php
    }
}

?><!DOCTYPE html>
<html>
<head>
	<title>webinar</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form action="update_workshop.php" method="post">
		<fieldset>
		<legend>Webinar registration</legend>
		<label for="woid">Workshop_id</label><br>
		<input type="text" name="woid" placeholder="Enter the Workshop_id"><br><br>
		<label for="woname">Workshop_name</label><br>
		<input type="text" name="woname" placeholder="Enter the Workshop_name"><br><br>
		<label for="coid">Company_id</label><br>
		<input type="text" name="coid" placeholder="Enter the company_id"><br><br>
		<label for="skill">skills</label><br>
		<input type="text" name="skill" placeholder="Enter the skill"><br><br>
		<label for="start">start_date</label><br>
		<input type="date" name="start" placeholder="Enter the date"><br><br>
		<label for="woid">timming</label><br>
		<input type="time" name="time" placeholder="Enter the time"><br><br>
		<label for="desc">Description</label><br>
		<textarea name="desc">Enter the description</textarea><br>
		<button type="submit" name="submit">SUBMIT</button>

		</fieldset>

</body>
</html>