<?php
		include("../dbcon.php");
		$id=$_GET['id'];
		$qry="DELETE FROM `student` WHERE id='$id'";
		$run = mysqli_query($con,$qry);

		if ($run) {
			?>
			<script>
				alert('Record is deleted sucessfully!');
				window.open('deletestudent.php','_self');	
			</script>
			<?php
		}else{
			echo "<script>alert('Record are not deleted');</script>";
		}
?>