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
	include("header.php");
?>
<div class="dashboard">
	<form action="updatestudent.php" method="post">
	<table  style="width:50%; padding: 20px;" align="center">
		<tr>
			<td>Select standard</td>
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
			<td>Enter student name</td>
			<td><input type="text" name="stname" placeholder="Enter Student Name" required="required"></td>

			<td colspan="2"><input type="submit" name="update" value="find"></td>
		</tr>
	</table>		
	</form>

	<table border="1" align="center" width="50%" style="margin-top: 10px;">
		<tr>
			<th>NO</th>
			<th>Image</th>
			<th>Name</th>
			<th>Roll No</th>
			<th>Action</th>
		</tr>
		<hr>
		<?php
			if (isset($_POST['update'])) {
				include('../dbcon.php');
				$standard=$_POST['std'];
				$name=$_POST['stname'];
				$sql = "SELECT * FROM student WHERE standard='$standard' AND name LIKE '%$name%'";
				$run= mysqli_query($con,$sql);
				$numrow=mysqli_num_rows($run);
				if ($numrow<1) {
					echo "<tr><td colspan='5' align='center'>No records found!</td></tr>";
				}else{
					$count=0;
					while ($data=mysqli_fetch_assoc($run)) {
						$count++;
						?>
						<tr>
							<td><?php echo $count; ?></td>
							<td><img src="../dataimages/<?php echo $data['image']; ?>" style="max-width: 100px; max-height: 100px;"/></td>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['rollno']; ?></td>
							<td><a href="updateform.php?id=<?php echo $data['id']; ?>">Edit</a> </td>
						</tr>
						<?php
					}
				}
			}
		?>
	</table>

</div>
</body>
</html>