<?php
$name = "John";
$stringPaddedLeft=str_pad($name,10,"_",STR_PAD_LEFT);
$stringPaddedRight=str_pad($name,8,"*",STR_PAD_RIGHT);
echo" Pad the string with underscores (`_`) on the left side to make its total length 10 characters: $stringPaddedLeft<br>";
echo"Pad the string with asterisks (`*`) on the right side to make its total length 8 characters : $stringPaddedRight<br>";

?>