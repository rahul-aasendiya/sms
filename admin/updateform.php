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
</head>
<body>
<?php
	include("../dbcon.php");
	include("header.php");
	$id = $_GET['id'];

	$sql="SELECT * FROM student WHERE  id='$id'";
	$run = mysqli_query($con, $sql);
	$data = mysqli_fetch_assoc($run);
?>
	<div class="dashboard">
		<form method="post" action="updatedata.php" enctype="multipart/form-data">
			<table style="width:50%;" align="center" border="1">
				<tr>
					<td>Roll No</td>
					<td>
						<input type="text" name="rollno" value="<?php echo $data['rollno'] ?>" required>
					</td>				
				</tr>
				<tr>
					<td>Full Name</td>
					<td>
						<input type="text" name="name"  value="<?php echo $data['name'] ?>" required>
					</td>				
				</tr>
				<tr>
					<td>City</td>
					<td>
						<input type="text" name="city" value="<?php echo $data['city'] ?>" required>
					</td>
				</tr>
				<tr>
					<td>Parents Contact No</td>
					<td>
						<input type="text" name="pcon" value="<?php echo $data['pcon'] ?>" required>
					</td>
				</tr>
				<tr>
					<td>standard</td>
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
					<td>Image</td><td><input type="file" name="simg"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
						<input type="submit" name="update" value="Update">
					</td>
				</tr>
			</table>		
		</form>		
	</div>
	<?php
	if (isset($_POST['update'])) {
		$rollno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$std=$_POST['std'];
		$id=$_POST['id'];
		$imgename=$_FILES['simg']['name'];
		$tempname=$_FILES['simg']['tmp_name'];
		move_uploaded_file($tempname, "../dataimages/$imgename");
		$qry="UPDATE student SET rollno='$rollno', name='$name',city='$city', pcon='$pcon', std='$std',image='$imgename' WHERE id='$id'";


		$run = mysqli_query($con,$qry);
		if ($run==true) {
			echo "<script>alert('Record is update sucessfully!');</script>";
		}else{
			echo "<script>alert('Record are not Update');</script>";
		}
	}
	?>
</body>
</html>