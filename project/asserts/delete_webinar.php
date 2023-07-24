<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Delete webinar</title>
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
	<h3>Delete webinar</h3>
<form method="post" action="delete_webinar.php">
	<fieldset>
	<label for="woid">  </label> <br>
	<input type="text" name="woid" placeholder="Enter Workshop Id" required >
<br><br>
	<button type="submit" name="submit">Delete</button>
	</fieldset>
</form>
</body>
</html>
<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit'])){
	$Wo_id=$_POST['woid'];
	$id_check="SELECT * FROM workshop WHERE WORKSHOP_ID=?";
	$id_stmt=$conn->prepare($id_check);
	$id_stmt->bind_param('s',$Wo_id);
	$id_stmt->execute();
	$id_stmt->store_result();
	if($id_stmt->num_rows()>0)
	{    
		$sql="DELETE FROM workshop WHERE WORKSHOP_ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$Wo_id);
		$result=$stmt->execute();
		if($result)
		{
			?>
		<script type="text/javascript">
			alert("Webinar deleted successfully!");
		</script>
		<?php
	}
	}
	else
	{
			?>
		<script type="text/javascript">
			alert("Webinar does not exists");
		</script>
		<?php
    }
}


?>
