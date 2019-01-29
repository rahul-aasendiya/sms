<?php
		include("../dbcon.php");
		$rollno=$_POST['rollno'];
		$name=$_POST['name'];
		$city=$_POST['city'];
		$pcon=$_POST['pcon'];
		$std=$_POST['std'];
		$id=$_POST['id'];
		$imgename=$_FILES['simg']['name'];
		$tempname=$_FILES['simg']['tmp_name'];
		move_uploaded_file($tempname, "../dataimages/$imgename");
		$qry="UPDATE student SET rollno='$rollno', name='$name',city='$city', pcon='$pcon', standard='$std',image='$imgename' WHERE id='$id'";
		$run = mysqli_query($con,$qry);

		if ($run) {
			echo "<script>alert('Record is update sucessfully!');</script>";
			header("Location: updateform.php?id=$id");
		}else{
			echo "<script>alert('Record are not Update');</script>";
		}
?>