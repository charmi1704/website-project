<?php session_start() ?>
<html>
	<body>
		<?php
		$cn=mysqli_connect("localhost","root","","website") or die("check connection");
		
        $product_name=$_POST['product_name'];
		$price=$_POST['price'];
        $product_quantity=$_POST['product_quantity'];
        $category_id=$_POST['category_id'];

		$sql="INSERT INTO product(product_name,price,product_quantity,category_id) VALUES ('$product_name','$price','$product_quantity','$category_id')";
		$result=mysqli_query($cn,$sql);
		$_SESSION['msg']="product inserted";
		header("Location:product.php");
	?>
</body>
</html>
