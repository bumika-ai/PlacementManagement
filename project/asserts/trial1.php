<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit'])){
	$Department = $_POST['department'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>student details</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="table.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
</head>
<body>
	<form method="post" action="trial1.php">
		<fieldset>
			<label for="department">Select your department</label><br>
			<select id="department" name="department" >
			<option value="select">select your department</option>
			<option value="cse">Computer science</option>
			<option value="ise">Information science</option>
			<option value="me">Mechanical engineering</option>
			<option value="tce">Telecommunication and engineering</option>
			<option value="eee">Electrical and electonics engineering</option>
			</select>
			<button type="submit" name="submit">GENERATE</button>
		</fieldset>
	</form>

	<br><br>

	<table>
		<tr>
			<th>USN</th>
			<th>NAME</th>
			<th>EMAIL</th>
		</tr>
		<?php
			$sql = "SELECT * FROM student1 WHERE DEPARTMENT = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s",$Department);
			$stmt->execute();
			$result = $stmt->get_result();
			if($row = $result->fetch_assoc())
			{
				?>
				<tr>
					<td> <?php echo $row['USN']; ?> </td>
					<td> <?php echo $row['NAME']; ?> </td>
					<td> <?php echo $row['EMAIL']; ?> </td>
				</tr><?php
			}
			else
			{?>
				<script type="text/javascript">alert("No student found with that department!");</script>
			<?php
			}
		?>
					 
	</table>
	
</body>
</html>