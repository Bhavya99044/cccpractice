<?php

//data types------------------------------------------------------------------------------------------------------------
$integerVar=87;
$floatVar=8.50;
$stringVar="hello";
$boolVar=true;
$array=array(1,2,3,"php");
$nullvar=null;

//typecasting------------------------------------------------------------------------------------------------------------
echo"--type casting--.<br>";
$num=123;
$string=(string)$num;
echo var_dump($string);
echo"--int typecasting--<br>";
$floatNum=23.59;
$intNum=(int)$floatNum;
echo var_dump($intNum);

//float typecasting------------------------------------------------------------------------------------------------------------
echo"--float typecasting--<br>";
$int=23;
$floatConversion=(float)$int;
echo var_dump($floatConversion);

//bool typecasting------------------------------------------------------------------------------------------------------------
echo"--bool typecasting--<br>";
$intValue=123;
$boolValue=(bool)$intValue;
echo var_dump($boolValue);
//example
$productAvailable="available";
$productIsAvailable=($productAvailable=="available");
if($productIsAvailable)
{
    echo"product is available<br><br>";
}
else{
    echo"product not available";
}
//array------------------------------------------------------------------------------------------------------------
echo"array type casting";
$msg="hello";
$arrayConversion=(array)$msg;
echo var_dump($msg);

echo"null typecasting";


?>