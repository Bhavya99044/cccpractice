<?php

$str="my name is,";
$length=strlen($str);
echo "string length is $length"."<br>";


//replace

$message="my name is bhavya ";

$replaceMessage=str_replace("bhavya","arun",$message);

echo $replaceMessage;
//pso

$org="this is me";

$variable="me";

$position=strpos($org,$variable);

echo "$position"."<br>";

//substr

$subString=substr($message,2,3);
echo "$subString<br>";

$trim=trim($message);
echo "$trim<br>";
function fun($var){
    echo("the new $var");
}
$language=array("java","js","php");

$implo =implode("*",$language);
fun($implo);


$explo=explode(" ",$message);
fun($explo);


?>