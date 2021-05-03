<?php
	 include_once("config.php");

	 $id = $_GET['id'];

	 $result=mysqli_query($db,"DELETE FROM products WHERE id=$id");

	 header("Location: create.php")
?>