<?php
function showdetails($std,$rollno){
	include("dbcon.php");
	$sql="SELECT * from student where standard='$std' AND rollno='$rollno'"; 
	$run = mysqli_query($con,$sql);
	if(mysqli_num_rows($run)>0){
		$data=mysqli_fetch_assoc($run);
		?>
		<table border="2" width="100%" style="margin-top: 20px;">
			<tr>
				<th colspan="3">Student Detail</th>
			</tr>
			<tr>
				<td rowspan="5"><img src="dataimages/<?php echo $data['image']; ?>" style="max-width: 100px; max-height: 100px;"/></td>
				<td>Roll No</td>
				<td><?php echo $data['rollno']; ?></td>
			</tr>
			<tr>
				<td>Full Name</td>
				<td><?php echo $data['name']; ?></td>
			</tr>
			<tr>
				<td>City</td>
				<td><?php echo $data['city']; ?></td>
			</tr>
			<tr>
				<td>Parents Contact No</td>
				<td><?php echo $data['pcon']; ?></td>
			</tr>
			<tr>
				<td> Standard</td>
				<td><?php echo $data['standard']; ?></td>
			</tr>
		</table>
		<?php
	}else{
		echo "<script>alert('No Student Found');</script>";
	}
}
?>