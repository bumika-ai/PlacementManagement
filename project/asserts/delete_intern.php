<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Delete internship</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="nav.css">
	
</head>
<body>
	
	<div class="nav">
	<ul><li><a href="welcome_admin.php">HOME</a></li>
		<li><a href="admin_logout.php">LOG OUT</a></li>
		<li><a href="index.php">Modify</a></li>
	</ul>
</div>
	<h3>Delete Internship</h3><br><br>
	
<form method="post" action="delete_intern.php">
	<fieldset>
	<label for="inid">  </label> <br>
	<input type="text" name="inid" placeholder="Enter Internship Id" required ">
<br><br>
	<button type="submit" name="submit">Delete</button>
	</fieldset>
</form>
</body>
</html>
<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit'])){
	$Id_id=$_POST['inid'];
	$id_check="SELECT * FROM internship WHERE INTERNSHIP_ID=?";
	$id_stmt=$conn->prepare($id_check);
	$id_stmt->bind_param('s',$Id_id);
	$id_stmt->execute();
	$id_stmt->store_result();
	if($id_stmt->num_rows()>0)
	{    
		$sql="DELETE FROM internship WHERE INTERNSHIP_ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$Id_id);
		$result=$stmt->execute();
		if($result){
			?>
		<script type="text/javascript">
			alert("internship Deleted successfully!");
		</script>
		<?php
	}
	}
	else
	{
			?>
		<script type="text/javascript">
			alert("Deletion unsuccessfully");
		</script>
		<?php
    }
}

?>
