<?php
session_start();
if (isset($_SESSION['uid'])) {

}else{
	header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>
	<div class="admintitle" align="center">
		<h4><a href="../logout.php" style="float: right; margin-right: 30px; font-size: 20px; color: white;">Lougot</a></h4>
		<h1>Welcome to Admin Dashboard</h1>
	</div>
	<div class="dashboard">
		<table style="width:30%;" align="center">
			<tr>
				<td>1.</td><td><a href="addstudent.php"> Insert student information</a></td>				
			</tr>
			<tr>
				<td>2.</td><td><a href="updatestudent.php"> Update student information</a></td>
			</tr>
			<tr>
				<td>3.</td><td><a href="deletestudent.php"> Delete student information</a></td>
			</tr>
		</table>
	</div>
</body>
</html>