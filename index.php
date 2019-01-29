<?php
session_start();
if (isset($_SESSION['uid'])) {
	header("location:admin/admindash.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>
</head>
<body>
	<h3 align="right" style="margin-right:20px;" ><a href="login.php">admin login</a></h3>
	<h1 align="center">Welcome to student management system</h1>
	<form method="post">
	<table style="width:30%;" align="center" border="1">
		<tr>
			<td colspan="2" align="center">Student information</td>
		</tr>
		<tr>
			<td align="left">Choose standard</td>
			<td>
				<select name="std">
					<option value="1">1st</option>
					<option value="2">2nd</option>
					<option value="3">3rd</option>
					<option value="4">4th</option>
					<option value="5">5th</option>
					<option value="6">6th</option>
					<option value="7">7th</option>
					<option value="8">8th</option>
					<option value="9">9th</option>
					<option value="10">10th</option>
					<option value="11">11th</option>
					<option value="12">12th</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="left">Enter rollno</td>
			<td><input type="text" name="rollno" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="showinfo" value="Show Detail"></td>
		</tr>
	</table>
	</form>
	<?php 
	if(isset($_POST['showinfo'])){
		$std = $_POST['std'];
		$rollno = $_POST['rollno'];
		include("dbcon.php");
		include("function.php");
		showdetails($std, $rollno);
	}
	?>
	
</body>
</html>