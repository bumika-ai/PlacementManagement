<?php
include 'C:\xampp\htdocs\project\app\connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Workshop Details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="table.css">
</head>
<body>
	<h3>workshop details</h3>
	<table>
		<tr>
			<th>Workshop_id</th>
			<th>Workshop_name</th>
			<th>Company_id</th>
			<th>Description</th>
			<th>Skills</th>
			<th>Start_date</th>
			<th>Timing</th>
		</tr>
		<?php
			$sql = "SELECT * FROM workshop";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()){?>
		<tr>
			<td> <?php echo $row['WORKSHOP_ID'];?></td>
			<td> <?php echo $row['WORKSHOP_NAME'];?></td>
			<td> <?php echo $row['COMPANY_ID']; ?> </td>
			<td> <?php echo $row['DESCRIPTION']; ?> </td>
			<td> <?php echo $row['SKILLS']; ?> </td>
			<td> <?php echo $row['START_DATE']; ?> </td>
			<td> <?php echo $row['TIMING']; ?> </td>
		</tr>
		<?php
			}
		?>
	</table>

</body>
</html>