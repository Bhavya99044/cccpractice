<?php
//creates array---------------------------------------------------------------------------------------------------------
$array1=array("firstname","surname","lastname");
echo"new created array $array1";
//merge array
echo"merged array";
$names1=array("bhavya","sachin","raj");
$names2=array("rhohit","mohit");
$newArray=array_merge($names1,$names2);
foreach($newArray as $i){
    echo" $i ";
}
//combine array
echo"combined array";
$products = array("fan", "light", "tv");
$price = array(34, 45, 56);
$combine = array_combine($products, $price);
foreach ($combine as $product => $price) {
    echo "$product: $price <br>";
}
// numeric array
$numericRange=range(1,10);
foreach($numericRange as $n){
    echo" $n ";
}

//array modification---------------------------------------------------------------------------------------------------
//push function
$products = array("Laptop", "Smartphone", "Headphones");

array_push($products, "Tablet");

echo "After adding a new product: " . implode(', ', $products) . "<br>";
//pop function
$removedProduct = array_pop($products);

echo "After removing the last product: " . implode(', ', $products) . "<br>";
echo "Removed Product: $removedProduct<br>";
//unshift function
array_unshift($products, "Camera");

echo "After adding a new product to the beginning: " . implode(', ', $products) . "<br>";
//array splice function
$indexToReplace = 2; 
$newProducts = array("VR Headset", "Bluetooth Speaker");

array_splice($products, $indexToReplace, 1, $newProducts);

echo "After replacing a product: " . implode(', ', $products) . "<br>";


//array access-----------------------------------------------------------------------------------------------------------
$products = array(
    "Laptop" => 50093,
    "Smartphone" => 45000,
    "Headphones" => 7999,
    "Tablet" => 32000
);
//count
echo "Number of products: " . count($products) . "<br>";
//sizeof
echo "Alternative number of products: " . sizeof($products) . "<br>";
//array key exist
$productToCheck = "Laptop";
if (array_key_exists($productToCheck, $products)) {
    echo "$productToCheck exists in the product list. Price: $" . $products[$productToCheck] . "<br>";
} else {
    echo "$productToCheck does not exist in the product list.<br>";
}
//array keys
echo "Product names: " . implode(', ', array_keys($products)) . "<br>";
//array values
echo "Product prices: $" . implode(', $', array_values($products)) . "<br>";


//array search----------------------------------------------------------------------------------------------------------
// Initial associative array representing product information
$products = array(
    "Laptop" => 8999,
    "Smartphone" => 49999,
    "Headphones" => 700,
    "Tablet" => 10000
);
//array search
$searchedPrice = 50000;
$searchedProduct = array_search($searchedPrice, $products);

if ($searchedProduct !== false) {
    echo "Product with price $$searchedPrice found: $searchedProduct<br>";
} else {
    echo "Product with price $$searchedPrice not found<br>";
}
//in array and array key function
$productToCheck = "Laptop";
if (in_array($productToCheck, array_keys($products))) {
    echo "$productToCheck exists in the product list.<br>";
} else {
    echo "$productToCheck does not exist in the product list.<br>";
}

$reversedProducts = array_reverse($products);

echo "Reversed product list: " . implode(', ', array_keys($reversedProducts)) . "<br>";

//array sorting
$products = array(
    "Laptop" => 100000,
    "Smartphone" => 30000,
    "Headphones" => 8000,
    "Tablet" => 30000
);

// Sorting functions

sort($products);

echo "Sorted product prices: ₹" . implode(', ₹', $products) . "<br>";

// rsort
rsort($products);

echo "Sorted product prices (descending): ₹" . implode(', ₹', $products) . "<br>";

asort($products);

echo "Sorted product prices with associated product names (ascending):<br>";
foreach ($products as $product => $price) {
    echo "$product: ₹$price<br>";
}

ksort($products);

echo "Sorted product names (ascending): " . implode(', ', array_keys($products)) . "<br>";

arsort($products);

echo "Sorted product prices with associated product names (descending):<br>";
foreach ($products as $product => $price) {
    echo "$product: ₹$price<br>";
}

krsort($products);

echo "Sorted product names (descending): " . implode(', ', array_keys($products)) . "<br>";




?>