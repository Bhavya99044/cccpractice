<?php 
$text = "Hello, World! How are you doing?<br>";
$length=strlen($text);
$lowercase=strtolower($text);
$uppercase=strtoupper($text);
$newString=str_replace("How are you doing?","Fine, thank you!",$text);
$stringFromStart=substr($text,0,10);
$sunStringFrom8th=substr($text,8,$length);
echo"the length of the string $length<br>";
echo"the entire string to lowercase $lowercase<br>";
echo"the entire string to uppercase $uppercase<br>";
echo" Replace How are you doing? with Fine, thank you! : $newString<br>";
echo" Extract and print the first 10 characters of the string : $stringFromStart<br>";
echo" Extract and print the substring starting from the 8th character to the end $subStringFrom8th.
<br>";

?>
