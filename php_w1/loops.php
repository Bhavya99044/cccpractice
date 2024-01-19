<?php
// Simulating an array of products----------------------------------------------------------------------------------
$products = array(
    "ProductA" => 29.99,
    "ProductB" => 39.99,
    "ProductC" => 19.99
);

//  for loop---------------------------------------------------------------------------------------------------------
echo " Using for loop<br>";
for ($i = 0; $i < count($products); $i++) {
    $productName = array_keys($products)[$i];
    $productPrice = $products[$productName];
    echo "$productName: $$productPrice\n";
}

//  while loop---------------------------------------------------------------------------------------------------------
echo " Using while loop<br>";
reset($products);
while (list($productName, $productPrice) = each($products)) {
    echo "$productName: $$productPrice\n";
}

// foreach loop---------------------------------------------------------------------------------------------------------
echo " Using foreach loop<br>";
foreach ($products as $productName => $productPrice) {
    echo "$productName: $$productPrice\n";
}

for ($i = 5; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "$j ";
    }

    echo "<br>";
}

?>
