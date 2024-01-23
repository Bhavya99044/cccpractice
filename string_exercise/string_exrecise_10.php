<?php

function calculateFactorial($n) {
    if ($n == 0) {
        return 1;
    } else {
        return $n * calculateFactorial($n - 1);
    }
}


$number = 5; 
$factorial = calculateFactorial($number);
echo "Factorial of $number is $factorial.";

?>
