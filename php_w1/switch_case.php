<?php
$orderStatus = "shipped";

switch ($orderStatus) {
    case "processing":
        echo "Your order is currently being processed. Please wait.<br>";
        break;

    case "shipped":
        echo "Your order has been shipped. It's on the way!<br>";
        break;

    case "delivered":
        echo "Your order has been delivered. Thank you for shopping with us!<br>";
        break;

    default:
        echo "Invalid order status. Please contact customer support.<br>";
        break;
}
?>
