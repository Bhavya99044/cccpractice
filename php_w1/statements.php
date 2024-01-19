<?php
$condition = true;

//  if statement------------------------------------------------------------------------------------------------------------
if ($condition) {
    echo " This condition is true.\n";
}

// if-else statement------------------------------------------------------------------------------------------------------------
$anotherCondition = false;
if ($anotherCondition) {
    echo " This condition is true.\n";
} else {
    echo " This condition is false.\n";
}

// if-else if-else statement------------------------------------------------------------------------------------------------------------
$grade = 75;
if ($grade >= 90) {
    echo " Grade A<br>";
} elseif ($grade >= 80) {
    echo " Grade B<br>";
} elseif ($grade >= 70) {
    echo " Grade C<br>";
} else {
    echo " Grade D<br>";
}

//Nested if statement------------------------------------------------------------------------------------------------------------
$outerCondition = true;
$innerCondition = false;
if ($outerCondition) {
    echo " Outer condition is true.<br>";
    
    if ($innerCondition) {
        echo " Inner condition is true.<br>";
    } else {
        echo " Inner condition is false.<br>";
    }
} else {
    echo " Outer condition is false.<br>";
}
?>
