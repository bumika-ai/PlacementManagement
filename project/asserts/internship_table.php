<?php
include 'C:\xampp\htdocs\project\app\connect.php';
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Internship offers</title>
	<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
	<h3>Internship Details</h3>
<table>
		<tr>
		<th>Internship_id</th>
		<th>Company_id</th>
		<th>Description</th>
		<th>Strip</th>
		<th>Location</th>
		<th>Start_date</th>
		<th>End_date</th>
		<th>Skills</th>
		<th>Type of internship</th>
	</tr>
		<?php
		$sql="SELECT * FROM internship";
		$stmt=$conn->prepare($sql);
		$stmt->execute();
		$result=$stmt->get_result();
        while($row=$result->fetch_assoc()){?>
    <tr>
		<td><?php echo $row['INTERNSHIP_ID'];?></td>
		<td><?php echo $row['COMPANY_ID'];?></td>
		<td><?php echo $row['DESCRIPTION'];?></td>
		<td><?php echo $row['STRIP'];?></td>
		<td><?php echo $row['LOCATION'];?></td>
		<td><?php echo $row['START_DATE'];?></td>
		<td><?php echo $row['END_DATE'];?></td>
		<td><?php echo $row['SKILLS'];?></td>
		<td><?php echo $row['TYPE'];?></td>
	</tr>
	<?php
		}
	?>
</table>
	
	
</body>
</html>