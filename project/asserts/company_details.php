<?php
include 'C:\xampp\htdocs\project\app\connect.php';

?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>company_details</title>
	<link rel="stylesheet" type="text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>
	<div class="background">
		<div class=transbox">
	<h3>Company details</h3>
	<table>
		<tr>
			<th>Company_id</th>
			<th>Company Name</th>
			<th>Company email</th>
			<th>Phone</th>
		</tr>
		<?php
			$sql = "SELECT * FROM company";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->get_result();
			while($row = $result->fetch_assoc()){?>
		<tr>
			<td> <?php echo $row['COMPANY_ID']; ?> </td>
			<td> <?php echo $row['COM_NAME']; ?> </td>
			<td> <?php echo $row['COM_EMAIL']; ?> </td>
			<td> <?php echo $row['PHONE']; ?> </td>
		</tr>
		<?php
			}
		?>
	</table>
</div>
</div>
</body>
</html>