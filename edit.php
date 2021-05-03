<?php
include_once("config.php");

if(isset($_POST['update']))
{
	$id=mysqli_real_escape_string($db, $_POST['id']);
	$productname=mysqli_real_escape_string($db,$_POST['productname']);
	$quantity=mysqli_real_escape_string($db,$_POST['quantity']);
	$productdescription=mysqli_real_escape_string($db,$_POST['productdescription']);
	$price=mysqli_real_escape_string($db,$_POST['price']);


	
		$result=mysqli_query($db, "UPDATE products SET productname='$productname', quantity='$quantity', productdescription='$productdescription',price='$price' WHERE id=$id");

		header("Location:create.php");
	}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($db, "SELECT * FROM products WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$productname = $res['productname'];
	$quantity = $res['quantity'];
	$productdescription = $res['productdescription'];
	$price = $res['price'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="create.php">Home</a>
	<br/><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td> Product Name</td>
				<td><input type="text" name="productname" value="<?php echo $productname;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
			</tr>
			<tr> 
				<td>Product Description</td>
				<td><input type="text" name="productdescription" value="<?php echo $productdescription;?>"></td>
			</tr>
			<tr>
				<td>Price</td>
				<td><input type="text" name="price" value="<?php echo $price;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
