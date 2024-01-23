<?php
$quote = "In three words I can sum up everything I've learned about life: it goes on.";
$length=str_word_count($quote);
$lowercase=strtolower($quote);
$capitalFistWord=ucwords($quote);
echo"1. Count the total number of words in the quote : $length<br>";
echo"2. Convert the entire quote to lowercase :$lowercase<br>";
echo"3. Capitalize the first letter of each word in the quote:$capitalFistWord<br>";


?>