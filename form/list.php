<?php

$servername = "127.0.0.1:4308";
$username = "root@";
$password = "";
$dbname = "ccc_practice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve the last 10 records
$sql = "SELECT * FROM ccc_product ORDER BY created_at DESC LIMIT 10";
$result = $conn->query($sql);

// Check if there are any records
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "Product Name: " . $row['product_name'] . "<br>";
        echo "SKU: " . $row["sku"] . "<br>";
        echo "Product Type: " . $row["product_type"] . "<br>";
        echo "Category: " . $row["category"] . "<br>";
        echo "Manufacturer Cost: " . $row["manufacturer_cost"] . "<br>";
        echo "Shipping Cost: " . $row["shipping_cost"] . "<br>";
        echo "Total Cost: " . $row["total_cost"] . "<br>";
        echo "Price: " . $row["price"] . "<br>";
        echo "Status: " . $row["status"] . "<br>";
        echo "Created At: " . $row["created_at"] . "<br>";
        echo "Updated At: " . $row["updated_at"] . "<br>";
        echo "<hr>";
        echo "<hr>";
    }
} else {
    echo "No records found";
}

// Close the connection
$conn->close();

?>
