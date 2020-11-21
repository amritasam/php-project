<?php
session_start();
if(isset($_SESSION['uid']))
{
	echo "";
}
else
{
	header('location:../login.php');
}

?>

<?php
include('header.php');
include('title.php');
?>
<html>
<body>
	<a href="admindash.php" style="float: left; margin-right:20px; font-size: 20px;">Back to Dashboard</a>
<form method="post" action="addstudent.php" enctype="multipart/form-data">
	<table align="center" border="1" style="width: 70%; margin-top: 40px;">
		<tr>
			<th>Roll No</th>
			<td><input type="text" name="rollno" placeholder="Enter roll no" required></td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" placeholder="Enter full name" required></td>
		</tr>
		<tr>
			<th>City</th>
			<td><input type="text" name="city" placeholder="Enter city" required></td>
		</tr>
		<tr>
			<th>Parents Contact No</th>
			<td><input type="text" name="pcon" placeholder="Enter the parent's contact" required></td>
		</tr>
		<tr>
			<th>Standard</th>
			<td><input type="number" name="std" placeholder="Enter standard" required></td>
		</tr>
		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" required></td>
		</tr>
		<tr>
			<td colspan="2" align="right" style="font-size: 20px;"><input type="submit" name="submit" value="Submit"></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
	include('../dbconn.php');
	$rollno = $_POST['rollno'];
	$name = $_POST['name'];
	$city = $_POST['city'];
	$pcon = $_POST['pcon'];
	$std = $_POST['std'];
	$imagename = $_FILES['simg']['name'];
	$tempname = $_FILES['simg']['tmp_name'];

	move_uploaded_file($tempname,"../dataimg/$imagename");



	$query = "INSERT INTO `student`(`rollno`,`name`,`city`,`pcont`,`standard`,`image`) VALUES('$rollno','$name','$city','$pcon','$std','$imagename')";
	$result = mysqli_query($conn,$query);
	if($result == true)
	{
		?>
		<script>
			alert('Data Inserted succesfully');
		</script>
		<?php
	}
}
?>

