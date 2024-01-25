<?php
include 'sql.php';

$conn = new mysqli("127.0.0.1:4308", "root@", "", "ccc_practice");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['group1'])) {
        $product_name = $_POST['group1']['product_name'];
        $sku = $_POST['group1']['sku'];
        $product_type = $_POST['group1']['product_type'];
        $category = $_POST['group1']['category'];
        $manufacturer_cost = $_POST['group1']['manufacturer_cost'];
        $shipping_cost = $_POST['group1']['shipping_cost'];
        $total_cost = $_POST['group1']['total_cost'];
        $price = $_POST['group1']['price'];
        $status = $_POST['group1']['status'];
        $created_at = $_POST['group1']['created_at'];
        $updated_at = $_POST['group1']['updated_at'];


        $insertQuery = "INSERT INTO ccc_product 
                        (product_name, sku, product_type, category, 
                        manufacturer_cost, shipping_cost, total_cost, 
                        price, status, created_at, updated_at) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("sssssssssss", $product_name, $sku, $product_type, $category,
            $manufacturer_cost, $shipping_cost, $total_cost, $price, $status, $created_at, $updated_at);

        if ($stmt->execute()) {
            echo "Data added successfully.";
        } else {
            echo "Error adding data: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Form data (group1 array) is not set.";
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
