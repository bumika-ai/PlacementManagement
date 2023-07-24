<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit']))
{
	$Year=$_POST['year'];
	$sql="SELECT * FROM student1 WHERE GRADUATION=?";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('i',$Year);
	$stmt->execute();
	$stmt->store_result();
	if($stmt->num_rows()>0)
	{    
		$sql="DELETE FROM student1 WHERE GRADUATION = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('i',$Year);
		$result=$stmt->execute();
		if($result)
		{
		?><script type="text/javascript">alert("Deleted successfully");</script><?php
		}
	}
	else
	{
		?><script type="text/javascript">
			alert("No records found with graduation year")
			</script><?php
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Delete student</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h3>Delete students</h3>
	<form method="post" action="delete_student.php">
		<fieldset>
			<label for="year">Graduation year</label>
			<input type="number" id="year" name="year" step="1" min="2021" max="2030" value="2021">
			<button type="submit" name="submit">Delete</button>
		</fieldset>
	</form>

</body>
</html>