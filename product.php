<?php session_start(); ?>
<html lang="en">

<center>
    <table style="color: #293d3d;">
        <h1>
            <header class="panel-heading">
                Product List
            </header>
        </h1>

        <form action="ins_product.php" method="post">
            
            <tr>
                <td><b><font face='Arial, Helvetica, sans-serif'>Product_name:</font></b></td>
                <td><input type="text" name="product_name" placeholder="Enter Product name"><br /></td>
            </tr>
            <tr>
                <td><b><font face='Arial, Helvetica, sans-serif'>Price:</font></b></td>
                <td><input type="text" name="price" placeholder="Enter Product Price"><br /></td>
            </tr>
            <tr>
                <td><b><font face='Arial, Helvetica, sans-serif'> Product_quantity:</font></b></td>
                <td><input type="text" name="product_quantity" placeholder="Enter Product quantity"><br /></td>
            </tr>
            <tr>
                <td><b><font face='Arial, Helvetica, sans-serif'>category_name:</font></b></td>
                <td><select name="category_id">
                    <?php
                     $cn = mysqli_connect("localhost", "root", "", "website") or die(mysqli_error());
                     $sql = "select * from category";
                     $result = mysqli_query($cn, $sql);
                     while ($arr = mysqli_fetch_array($result)) {
                        ?>
                        <option value="<?php echo $arr['category_id']?>">
                        <?php echo $arr['category_name'] ?>
                     </option>
                     <?php
                     }
                     mysqli_close($cn)
                     ?>
                     </select><br/></td>
            </tr>
            <tr>
                <td><b><font face='Arial, Helvetica, sans-serif'>Product image</font></b></td>
                <td><input type="text" name="product_name" placeholder="Enter Product Name"><br /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input class="btn btn-danger" type="submit" value="submit"
                                                      name="btn"></td>
            </tr>
        </form>

        <tr>
            <td>
                <center>
                    <?php
                    if (isset($_SESSION['msg'])) {
                        echo $_SESSION['msg'];
                        unset ($_SESSION['msg']);
                    }
                    ?>
                </center>
            </td>
        </tr>
    </table>
    <?php
    $cn = mysqli_connect("localhost", "root", "", "website") or die(mysqli_error());
    $sql = "SELECT c.category_id,p.product_id,product_name,price,product_quantity from product p,category c where p.category_id=c.category_id";
    $result = mysqli_query($cn, $sql);
    echo "<br>";

    echo mysqli_num_rows($result) . " records found";
    echo " <table class=table-striped table-advance table-hover bgcolor='#29a3a3' border='1' cellpadding='10' cellspacing='10' style='border-radius: 10px;width: 80%;text-align: center;'>";
    echo "<tr style='color: #001a33;font-weight: bold;background: #FFF;text-transform: capitalize;'>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;Product_Id</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;Product_name</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;price</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;product_quantity</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;category_id</font></b></td>";
    echo "<td><b><font face='Arial, Helvetica, sans-serif'>&nbsp;product_image</font></b></td>";
    echo "</tr>";
    echo "<br>";

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr class=white>";

        echo "<td >${row['product_id']}</td>";
        echo "<td>${row['product_name']}</td>";
        echo "<td>${row['price']}</td>";
        echo "<td>${row['product_quantity']}</td>";
        echo "<td>${row['category_id']}</td>";
        echo "<td>${row['product_image']}</td>";
        echo "<td><a href='edit_product.php?product_id=${row['product_id']}'><u>Edit</u></a> | <a href='del_product.php?product_id=${row['product_id']}'><u>Delete</u></a></td>";
        echo "</tr>";
    }
    echo "</table>";

    mysqli_close($cn);
    ?>
</center>
</html>