<!DOCTYPE html>
<html>
<head>
	<title>SIGN UP</title>
</head>
<body>
<form action="register.php" method="post">

	<h1>SIGN UP</h1>
	<input type="text" name="fname" placeholder="First Name" required="required"/><div></div>
	<input type="text" name="lname" placeholder="Last Name" required="required"/><div></div>
	<input type="text" name="Contact" placeholder="Contact" required="required"/><div></div>
	<input type="submit" name="submit" value="SIGN UP"/><div></div>

	
</form>
</body>
</html>

<?php
include_once('config.php');

if (isset($_POST['submit']))
{
	$fname=mysqli_real_escape_string($db,$_POST['fname']);
	$lname=mysqli_real_escape_string($db,$_POST['lname']);
	$Contact=mysqli_real_escape_string($db,$_POST['Contact']);

	$result=mysqli_query($db, "INSERT INTO user (fname,lname,Contact) VALUES ('$fname','$lname','$Contact')");

	echo "<script>alert('Registered Successfully');
	</script>";
}
?>