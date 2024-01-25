<?php
include 'connection1.php';
include 'sql.php';

if($_GET['action']=='edit'){
    $pname=$_GET['id'];
    $col=['pname','sku','product_type','category','manufacture_cost','shipping_cost','total_cost','price','status','created_at','updated_at'];
    $sql=select('ccc_product',$col)." WHERE pname='$pname'";;
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Information Form</title>
</head>
<body>
    
    <form action="connection1.php" method="post">

        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="group1[product_name] value=<?php echo$row['product_name']?>" ><br>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="group1[sku]" ><br>

        <label>Product Type:</label>
        <input type="radio" id="simple" name="group1[product_type] value=<?php echo $row['product_type']?> >
        <label for="simple>Simple</label>
        <input type="radio" id="bundle" name="group1[product_type]" value="<?php echo $row['product_type']?>">
        <label for="bundle">Bundle</label><br>

        <label for="category">Category:</label>
        <select id="category" name="group1[category] value="<?php echo $row['product_type']?> > 
            <option value="Bar_&_Game_Room">Bar & Game Room</option>
            <option value="Bedroom">Bedroom</option>
            <option value="Decor">Decor</option>
            <option value="Dining_&_Kitchen">Dining & Kitchen</option>
            <option value="Lighting">Lighting</option>
            <option value="Living_Room">Living Room</option>
            <option value="Mattresses">Mattresses</option>
            <option value="Office">Office</option>
            <option value="Outdoor">Outdoor</option>
        </select><br>

        <label for="manufacturer_cost">Manufacturer Cost:</label>
        <input type="text" id="manufacturer_cost" name="group1[manufacturer_cost] value="<?php echo $row['product_type']?>  ><br>

        <label for="shipping_cost">Shipping Cost:</label>
        <input type="text" id="shipping_cost" name="group1[shipping_cost] value="<?php echo $row['product_type']?> ><br>

        <label for="total_cost">Total Cost:</label>
        <input type="text" id="total_cost" name="group1[total_cost] value="<?php echo $row['total_cost']?> ><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="group1[price] value="<?php echo $row['price']?> ><br>

        <label for="status">Status:</label>
        <select id="status" name="group1[status]" >
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option>
        </select><br>

        <label for="created_at">Created At:</label>
        <input type="date" id="created_at" name="group1[created_at] value="<?php echo $row['created_at']?> ><br>

        <label for="updated_at">Updated At:</label>
        <input type="date" id="updated_at" name="group1[updated_at] value="<?php echo $row['updated_at']?> ><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
