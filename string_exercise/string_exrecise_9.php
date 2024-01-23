<?php

function genFibonacci($terms) {
    $fibonacci = [0, 1];
    
    for ($i = 2; $i < $terms; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }

    return $fibonacci;
}

$numberOfTerms = 10; 
$fibonacciSequence = genFibonacci($numberOfTerms);
echo implode(', ', $fibonacciSequence);

?>
