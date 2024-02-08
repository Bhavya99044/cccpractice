<?php
include 'connection.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch last 5 records
$sql = "SELECT * FROM mest ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr>
        <th>id</th>
                <th>Product Name</th>
                <th>SKU</th>
                <th>edit</th>
                <th>delete</th>
                
              </tr>";
    
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["id"]."</td>";
            echo "<td>" . $row["product_name"] . "</td>";
            echo "<td>" . $row["sku"] . "</td>";
            echo "<td><a href='home.php?action=edit&id=" . $row["id"] . "'>Edit</a></td>";

        echo "<td><a href='home.php?action=delete&id=" . $row["id"] . "'>Delete</a></td>";

            echo "</tr>";
        }
        echo "</table>";
} else {
    echo "No records found";
}
}
// Close the database connection
?>
