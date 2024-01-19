<?php

function rn($value){
    echo "value :$value<br>";
}

//equal
$value1 = 5;
$value2 = "5";

$result = ($value1 == $value2);
rn($result);
//identical
$value3 = 5;
$value4 = "5";
$result = ($value3 === $value4);
rn($result);

//not equal
$value4 = 10;
$value6 = 5;

$result = ($value5 != $value6);
rn($result);

//not identical
$value7 = 10;
$value8 = "10";

$result = ($value7 !== $value8);
rn($result);

//greater than

$number9 = 15;
$number10 = 10;

$result = ($number9 > $number10);
rn($result);

//less than
$number11 = 15;
$number12= 20;

$result = ($number11 < $number12);
rn($result);

//greater than or equal to
$number13 = 15;
$number14 = 15;

$result = ($number13 >= $number14);
//less than or equal to
$number15 = 15;
$number16= 20;

$result = ($number15 <= $number16);
rn($result);

?>