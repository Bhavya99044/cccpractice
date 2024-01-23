<?php
$sentence = "The quick brown fox jumps over the lazy dog";
$posOfFox=strpos($sentence,"fox");
$cat=strpos($sentence,"cat");
if($cat==true){
    $presentCat="present";
}
else{
    $presentCat="not present";
}
$extractFist20=substr($sentence,0,20);
echo"the position of the word 'fox' in the sentence is $posOfFox<br>";
echo"Check if the word 'cat' is present in the sentence :$presentCat<br>";
echo"Extract and print the first 20 characters of the sentence: $extractFist20<br>";

?>