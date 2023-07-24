<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit'])){
	$Internship_id=$_POST['internship_id'];
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Interships</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
	<h1>Internship offers</h1>
	<table>
		<tr>
			<th>INTERNSHIP_ID</th>
			<th>COMPANY_ID</th>	
			<th>DESCRIPTION</th>	
			<th>LOCATION</th>
			<th>START_DATE</th>	
			<th>END_DATE</th>	
			<th>SKILLS</th>
		</tr>
		<?php
		$sql="SELECT * FROM internship WHERE INTERNSHIP_ID=?";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param("s",$Internship_id);
		$stmt->execute();
		$result=$stmt->get_result();
        while($row=$result->fetch_assoc()){?>
    <tr>
		<td><?php echo $row['INTERNSHIP_ID'];?></td>
		<td><?php echo $row['COMPANY_ID'];?></td>
		<td><?php echo $row['DESCRIPTION'];?></td>
		<td><?php echo $row['LOCATION'];?></td>
		<td><?php echo $row['START_DATE'];?></td>
		<td><?php echo $row['END_DATE'];?></td>
		<td><?php echo $row['SKILLS'];?></td>
	</tr>
	<?php
		}
	?>
    </table>
	<a href="add_internship">To update internship</a>

</body>
</html>