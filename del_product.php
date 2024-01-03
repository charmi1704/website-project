<?php session_start() ?>
<html>
	<body>
		<?php
		$cn=mysqli_connect("localhost","root","","website") or die("check connection");
		$product_id=$_GET['product_id'];
		$sql="delete from product where product_id='$product_id'";
		$result=mysqli_query($cn,$sql);
		$_SESSION['msg']="product deleted";
		header("Location:product.php");
	?>
</body>
</html>
