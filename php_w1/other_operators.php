<?php
// Initialize variables
$number1 = 10;
$number2 = 5;

//  Ternary Operator
$maxNumber = ($number1 > $number2) ? $number1 : $number2;

// Increment and Decrement Operator
$incrementedNumber = $number1++;
$decrementedNumber = $number2--;

// String Operat
$string1 = "Hello";
$string2 = "World";
$concatenatedString = $string1 . " " . $string2;

// Logical Operators
$isEven = ($number1 % 2 == 0) && ($number2 % 2 == 0);
$isPositive = ($number1 > 0) || ($number2 > 0);
$isNumber1NotZero = !($number1 == 0);

//concatenation assignment
$combinedString = "Combined: ";
$combinedString .= $concatenatedString;


echo"iseven:$isEven<br>";
echo"ispositive:$isPositive<br>";
echo"number not zero $isNumber1NotZero<br>";
echo "Original Numbers: $number1, $number2<br>";
echo "Max Number: $maxNumber<br>";
echo "Incremented Number: $incrementedNumber<br>";
echo "Decremented Number: $decrementedNumber<br>";
echo "Concatenated String: $concatenatedString<br>";
echo"conc assignment:$combinedString";


?>
