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
	<form action="login.php" method="post">
		<table style="width:30%;" align="center" >			
		<tr>
			<td colspan="2" align="center"><h1>Admin login</h1></td>
		</tr>
		<tr>
			<td align="left">Username : </td>
			<td align="left"><input type="text" name="uname" required></td>
		</tr>
		<tr>
			<td align="left">Password :</td>
			<td align="left"><input type="Password" name="pass" required></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="login" value="Login"></td>
		</tr>
		</table>
	</form>
<?php
include('dbcon.php');
if (isset($_POST['login'])) {
	$user = $_POST['uname'];
	$pass = $_POST['pass'];

	$qry = "SELECT * from admin where username='$user' and Password='$pass'";
	$run=mysqli_query($con,$qry);
	$row = mysqli_num_rows($run);
	if ($row < 1) {
		?>
		<script>
			alert("Username and password are wrong");
			window.open('login.php','_self');
		</script>
		<?php
	}else{
		$data=mysqli_fetch_assoc($run);
		$id=$data['id'];
		session_start();
		$_SESSION['uid']=$id;
		header("location: admin/admindash.php");
	}
}
?>
</body>
</html>