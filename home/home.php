<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Form</title>

    <?php
    include 'connection.php';
    
    $editRow = [];  // Initialize $editRow

    if (isset($_GET['action']) && isset($_GET['id'])) {
        $action = $_GET['action'];
        $id = $_GET['id'];

        if ($action === 'edit') {
            // Fetch the record for editing
            $editSql = "SELECT * FROM mest WHERE id = $id";
            $editResult = $conn->query($editSql);

            if ($editResult->num_rows > 0) {
                $editRow = $editResult->fetch_assoc();
                // Populate the form fields with existing data for editing
                echo "<script>
                        document.getElementById('product_name').value = '{$editRow["product_name"]}';
                        document.getElementById('sku').value = '{$editRow["sku"]}';
                      </script>";
            } else {
                echo "Record not found for editing";
            }
        } elseif ($action === 'delete') {
            // Perform delete operation
            $deleteSql = "DELETE FROM mest WHERE id = $id";
            if ($conn->query($deleteSql) === TRUE) {
                echo "Record deleted successfully";
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    }
    ?>
</head>
<body>
    <form action="connection.php" method="post">
    <input type="hidden" name="id" value="<?php echo isset($editRow['id']) ? $editRow['id'] : ''; ?>">
    <label for="product_name">Product Name:</label>
    <input type="text" id="product_name" name="product_name" value="<?php echo isset($editRow['product_name']) ? $editRow['product_name'] : ''; ?>"><br>

    <label for="sku">SKU:</label>
    <input type="text" id="sku" name="sku" value="<?php echo isset($editRow['sku']) ? $editRow['sku'] : ''; ?>"><br>

    <input type="submit" value="Submit">
</form>


    <!-- Rest of your HTML code -->
</body>
</html>

<?php
// The rest of your PHP code
?>
