<?php
// Include functions file
include 'connection1.php';
// Get action from the URL (edit, delete)
$action = getParams('action');

// Handle form submission for insert or update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_data = $_POST['group1'];
    
    // Check if it's an update
    if ($action == 'edit') {
        $id = getParams('id');
        $result = updateData('your_product_table', $product_data, ['id' => $id]);
        echo $result;
    } else {
        // It's an insert
        $result = insertData('your_product_table', $product_data);
        echo $result;
    }
}

// Get data for editing (if applicable)
if ($action == 'edit') {
    $id = getParams('id');
    $product_to_edit = selectData('your_product_table', '*', ['id' => $id]);
}

// Display the form for insert or update
?>

<form action="catalog/product.php?action=<?php echo $action; ?>&id=<?php echo getParams('id'); ?>" method="post">
    <!-- Your form fields here -->
    <input type="submit" value="Submit">
</form>
