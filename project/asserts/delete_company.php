<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Delete company</title>
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
	<h3>Delete Company</h3>
<form method="post" action="delete_company.php">
	<fieldset>
	<label for="coid">  </label> <br>
	<input type="text" name="coid" placeholder="Enter Company Id" required >
<br><br>
	<button type="submit" name="submit">Delete</button>
	</fieldset>
</form>
</body>
</html>
<?php
include 'C:\xampp\htdocs\project\app\connect.php';
if(isset($_POST['submit'])){
	$Co_id=$_POST['coid'];
	$id_check="SELECT * FROM company WHERE COMPANY_ID=?";
	$id_stmt=$conn->prepare($id_check);
	$id_stmt->bind_param('s',$Co_id);
	$id_stmt->execute();
	$id_stmt->store_result();
	if($id_stmt->num_rows()>0)
	{    
		$sql="DELETE FROM company WHERE COMPANY_ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("s",$Co_id);
		$result=$stmt->execute();
		if($result)
		{
			?>
		<script type="text/javascript">
			alert("Company deleted successfully!");
		</script>
		<?php
	}
	}
	else
	{
			?>
		<script type="text/javascript">
			alert("Company does not exists");
		</script>
		<?php
    }
}


?>
