
<?php
session_start();

// Check if the product_id is set in the URL
if (!isset($_GET['product_id'])) {
    header("Location: product.php"); // Redirect to the main page or handle the error accordingly
    exit();
}

$product_id = $_GET['product_id'];

// Fetch product details from the database based on the product_id
$cn = mysqli_connect("localhost", "root", "", "website") or die(mysqli_error());
$sql = "SELECT p.product_id,product_name,price,product_quantity,product_image FROM product p,category c,product_image pi where p.category_name=c.category_name and p.product_id=pi.product_id";
$result = mysqli_query($cn, $sql);

// Check if the product exists
if (mysqli_num_rows($result) == 0) {
    header("Location: product.php"); // Redirect to the main page or handle the error accordingly
    exit();
}

$product = mysqli_fetch_assoc($result);

// Handle form submission for updating product details
if (isset($_POST['btn'])) {
    $product_name = mysqli_real_escape_string($cn, $_POST['product_id']);
    $product_size = mysqli_real_escape_string($cn, $_POST['product_name']);
    $product_quantity = mysqli_real_escape_string($cn, $_POST['price']);
    $category_name = mysqli_real_escape_string($cn, $_POST['product_quantity']);
    $product_price = mysqli_real_escape_string($cn, $_POST['category_name']);
    $product_image = mysqli_real_escape_string($cn, $_POST['product_image']);


     $update_sql = "UPDATE product p
               JOIN category c ON p.category_id = c.category_id
               JOIN product_image pi ON p.product_id = pi.product_id
               SET p.product_name = '$product_name',  
               p.product_quantity = '$product_quantity', 
               p.price = '$price',
               c.category_name = '$category_name', 
               pi.product_image = '$product_image'
               WHERE p.product_id = $product_id";



    if (mysqli_query($cn, $update_sql)) {
        $_SESSION['msg'] = "Product updated successfully!";
        header("Location: product.php"); // Redirect to the main page or the product list page
        exit();
    } else {
        $_SESSION['msg'] = "Error updating product: " . mysqli_error($cn);
    }
}

mysqli_close($cn);
?>

<html lang="en">

<head>
    <title>Edit Product</title>
</head>

<body>
    <center>
        <h1>Edit Product</h1>

        <form action="" method="post">
            <label>Product name:</label>
            <input type="text" name="product_name" value="<?php echo $product['product_id']; ?>" required><br>

            <label>Product size:</label>
            <input type="text" name="product_size" value="<?php echo $product['product_name']; ?>" required><br>

            <label>Product quantity:</label>
            <input type="text" name="product_quantity" value="<?php echo $product['price']; ?>" required><br>

            <label>Category name:</label>
            <input type="text" name="category_name" value="<?php echo $product['product_quantity']; ?>" required><br>

            <label>Product price:</label>
            <input type="text" name="product_price" value="<?php echo $product['category_name']; ?>" required><br>

            <label>Product image:</label>
            <input type="text" name="product_image" value="<?php echo $product['product_image']; ?>" required><br>

            <input type="submit" name="btn" value="Update">                      
        </form>

        <p><?php echo isset($_SESSION['msg']) ? $_SESSION['msg'] : ''; ?></p>

        
    </center>
</body>

</html>
