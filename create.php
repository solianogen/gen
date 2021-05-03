
<?php
session_start();
?>

<?php
include_once('config.php');

if (isset($_POST['submit'])){

	$productname=mysqli_real_escape_string($db,$_POST['productname']);
	$quantity=mysqli_real_escape_string($db,$_POST['quantity']);
	$productdescription=mysqli_real_escape_string($db,$_POST['productdescription']);
	$price=mysqli_real_escape_string($db,$_POST['price']);

	$result=mysqli_query($db, "INSERT INTO products (productname,quantity,productdescription,price) VALUES ('$productname','$quantity','$productdescription','$price')");
	echo "<script>alert('Successfully Added');
	</script>";

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Products</title>
</head>
<body>
	<form action="create.php" method="POST">
		<table width="25%" border="0">
			<tr>
				<td>Product Name</td>
				<td><input type="text" name="productname" required="required"></td>
			</tr>
			<tr>
				<td>Quantity</td>
				<td><input type="text" name="quantity" required="required"></td>
			</tr>
			<tr>
			<td>Product Description</td>
				<td><input type="text" name="productdescription" required="required"></td>
			</tr>
			<tr>
			<td>price</td>
				<td><input type="text" name="price" required="required"></td>
			</tr>
			<td><input type="submit" name="submit" value="ADD PRODUCTS"></td>

		</table>
			

	</form>
</body>
</html>
<?php
	include_once("config.php");

	$result= mysqli_query($db, "SELECT * FROM `products` ORDER BY id DESC");
	?>
		<table width="80%" border="0">
			<tr bgcolor="#CCCCCCC">
				<td>Product Name</td>
				<td>Quantity</td>
				<td>Product Description</td>
				<td>Price</td>
				<td>Update</td>
				
			</tr>
			<?php

			while ($res = mysqli_fetch_array($result)) {
				echo "<tr>";
				echo "<td>".$res['productname']."</td>";
				echo "<td>".$res['quantity']."</td>";
				echo "<td>".$res['productdescription']."</td>";
				echo "<td>".$res['price']."</td>";

				echo "<td><a href=\"edit.php?id=$res[id]\"> Edit</a> | <a href =\"delete.php?id=$res[id]\" onclick=\" return confirm ('Are you sure you want to delete?')\">Delete</a></td>";

			}
			?>

		</table>
