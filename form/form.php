<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Information Form</title>
</head>
<body>
    
    <form action="datas.php" method="post">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="group1[product_name]" ><br>

        <label for="sku">SKU:</label>
        <input type="text" id="sku" name="group1[sku]" ><br>

        <label>Product Type:</label>
        <input type="radio" id="simple" name="group1[product_type]" value="Simple" >
        <label for="simple">Simple</label>
        <input type="radio" id="bundle" name="group1[product_type]" value="Bundle">
        <label for="bundle">Bundle</label><br>

        <label for="category">Category:</label>
        <select id="category" name="group1[category]" > 
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
        <input type="text" id="manufacturer_cost" name="group1[manufacturer_cost]" ><br>

        <label for="shipping_cost">Shipping Cost:</label>
        <input type="text" id="shipping_cost" name="group1[shipping_cost]" ><br>

        <label for="total_cost">Total Cost:</label>
        <input type="text" id="total_cost" name="group1[total_cost]" ><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="group1[price]" ><br>

        <label for="status">Status:</label>
        <select id="status" name="group1[status]" >
            <option value="Enabled">Enabled</option>
            <option value="Disabled">Disabled</option>
        </select><br>

        <label for="created_at">Created At:</label>
        <input type="date" id="created_at" name="group1[created_at]" ><br>

        <label for="updated_at">Updated At:</label>
        <input type="date" id="updated_at" name="group1[updated_at]" ><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
