<?php
// Replace these values with your actual database credentials
$servername = "127.0.0.1:4308";
$username = "root@";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $sku = $_POST["sku"];

    // Check if 'id' is set in POST data, indicating an edit operation
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        // Update existing record using prepared statement
        $updateSql = "UPDATE mest SET product_name=?, sku=? WHERE id=?";
        $stmt = $conn->prepare($updateSql);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ssi", $product_name, $sku, $id);

        if ($stmt->execute()) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Insert new record using prepared statement
        $insertSql = "INSERT INTO mest (product_name, sku) VALUES (?, ?)";
        $stmt = $conn->prepare($insertSql);

        // Bind parameters to the prepared statement
        $stmt->bind_param("ss", $product_name, $sku);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error creating record: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    }
}

// Close the database connection
?>
