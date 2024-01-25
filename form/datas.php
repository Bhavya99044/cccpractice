<?php
include 'mysql.php';
include 'php_function.php';
$conn=new mysqli("127.0.0.1:4308","root@","","ccc_practice");


// insert("ABC",$_POST["group1"]);

        $group1Data = $_POST["group1"];
        echo "<pre>";
        print_r($group1Data);
   

$product_name = $group1Data['product_name'];
$sku = $group1Data['sku'];
$product_type = $group1Data['product_type'];
$category = $group1Data['category'];
$manufacturer_cost = $group1Data['manufacturer_cost'];
$shipping_cost = $group1Data['shipping_cost'];
$total_cost = $group1Data['total_cost'];
$price = $group1Data['price'];
$status = $group1Data['status'];
$created_at = $group1Data['created_at'];
$updated_at = $group1Data['updated_at'];

$insertQuery = "INSERT INTO ccc_product (product_name, sku, product_type, category, manufacturer_cost, shipping_cost, total_cost, price, status, created_at, updated_at) 
    VALUES ('$product_name', '$sku', '$product_type', '$category', '$manufacturer_cost', '$shipping_cost', '$total_cost', '$price', '$status', '$created_at', '$updated_at')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "data added";
    }



    $username = getParams('product_name');
    echo $username;
    if ($username !== "Var not found!!") {
        echo "Username: " . $username;
    } else {
        echo "Username not provided";
    }

?>