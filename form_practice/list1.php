;<?php
include 'sql.php';

$conn = new mysqli("127.0.0.1:4308", "root@", "", "ccc_practice");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
;
// Fetch the last 20 records from the database
$selectQuery = "SELECT product_name, sku, category FROM ccc_product ORDER BY created_at DESC LIMIT 20";
$result = $conn->query($selectQuery);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Last 20 Records</title>
</head>
<body>

<table border="1">
    <tr>
        <th>Product Name</th>
        <th>SKU</th>
        <th>Category</th>
        <th>edit</th>
        <th>delete</th
    </tr>

    <?php
    while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['sku']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><a href="form1.php?action=edit&id={$row['product_name']}>Edit</a></td>;
            <td><a href="form1.php?action?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>

</table>

</body>
</html>
