<?php
include 'C:\xampp\htdocs\project\app\connect.php';

if(isset($_POST['submit']))
{
    $IN_ID=$_POST['inid'];
	$Company_id=$_POST['coid'];
	$Description=$_POST['desc'];
	$Strip=$_POST['strip'];
	$Location=$_POST['loc'];
	$Start_date=$_POST['start'];
	$End_date=$_POST['end'];
	$Skill=$_POST['skill'];	
	$Type=$_POST['type'];

	$id_check="SELECT * FROM internship WHERE INTERNSHIP_ID=?";
	$id_stmt=$conn->prepare($id_check);
	$id_stmt->bind_param('s',$IN_ID);
	$id_stmt->execute();
	$id_stmt->store_result();
	if($id_stmt->num_rows()>0)
	{
		$sql="UPDATE internship SET COMPANY_ID=?,DESCRIPTION=?,STRIP=?,LOCATION=?,START_DATE=?,END_DATE=?,SKILLS=?,TYPE=? WHERE INTERNSHIP_ID=?";
		$stmt=$conn->prepare($sql);	
		$stmt->bind_param("ssissssss",$Company_id,$Description,$Strip,$Location,$Start_date,$End_date,$Skill,$Type,$IN_ID);
		$result=$stmt->execute();
		if($result)
		{
			?>
		<script type="text/javascript">
			alert("Updated successfully!");
		</script>
		<?php
	}
	}
	else
	{
			?>
		<script type="text/javascript">
			alert("Inernship_id does not exists");
		</script>
		<?php
    }
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Update_internship</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
</head>

<body>
	<h3>Inernship updates</h3>
	<form  method="post" action="update_internship.php">
		
		<fieldset>
			<label for=inid>Internship_ID</label><br>
			<input type="text" id="inid" name="inid" placeholder="Enter the Internship_id" required="required"><br><br>

			<label for=coid>Company_ID</label><br>
			<input type="text" id="coid" name="coid" placeholder="Enter the Company_id" required="required"><br><br>

			<label for=strip>Strip</label><br>
			<input type="tel" id="strip" name="strip" required="required" placeholder="Enter the strip allowted" maxlength="5"><br><br>

			<label for=loc>Location</label><br>
			<input type="text" id="loc" name="loc" required="required" placeholder="Enter the location"><br><br>

			<label for=start>Start_Date</label><br>
			<input type="date" id="start" name="start" required="required" placeholder="Enter the start date"><br><br>

			<label for=end>End_Date</label><br>
			<input type="date" id="end" name="end" required="required" placeholder="Enter the end date"><br><br>

			<label for=skill>Skills</label><br>
			<input type="text" id="skill" required="required" name="skill" placeholder="Enter the skills required"><br><br>
			
			<label for=type>Types of Internship</label><br>
			<input type="text" id="type" required="required" name="type" placeholder="Enter the type of internship"><br><br>
			<label for="desc">Description</label><br>
		<textarea name="desc">Enter the description</textarea><br>

			<button type="submit" name="submit">Submit</button><br><br>
			<a href="internship_table.php">Internship offers</a>
		</fieldset>
	</form>
</body>
</html>