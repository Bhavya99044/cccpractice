<?php

echo "--string length--<br>";
$message="cybercom creation";
$msgLength=strlen($message);//the maximum strlength limit is dependent on the 32 or 64 bit system
echo"the length of the $message is $msgLength<br><br>";
// for credit/debit card number limit

echo"--replace function--<br>";
$name="my name is bhavya";
$replace=str_replace("bhavya","rohit",$name);//first parameter is search second is replace and last is original string
echo"the previous string is $name<br>";
echo"updated string is $replace<br><br>";
// for database changes or user input handling

echo"--position function--<br>";

$product = array("light", "camera", "fan");
$foundProduct = "fan";
foreach ($product as $productName) {
    $position = strpos($productName, $foundProduct);
    if ($position !== false) {
        echo "Product found: $productName<br><br>";
    }}
if ($position === false) {
    echo "product not found<br><br>";
}
//to check if the product is available or not in the database

echo"--sbstr function--<br><br>";

$productData="the description of the product";
$maxData=20;
$shortData=substr($productData,0,$maxData);
echo "$shortData";
if(strlen($productData)>$maxData){
    echo'<a href="#">read more</a><br><br>';
}
//for showing data in limited words

echo "--strtolower function--<br>";

$inputUsername="bHaVYa";
$username=strtolower($inputUsername);
$users=array("bhavya","harsh","crystal");
if(in_array($username,$users)){
    echo"user exist<br><br>";
}
    else{
echo "user not exist";
    
}
//to check if the username already exist in the system or not

echo"--strtoupper function<br>";
$userPan="abc11hsn3";
$validPan=strtoupper($userPan);
$pan=array("ABC11HSN3","BVCHBG3");
if(in_array($validPan,$pan)){
    echo"user exist<br><br>";
}
else{
    echo"user not exist";
}

//to check panid valid or not
echo"--trim function--";
$userInputUsername = "   bhavya_jain   ";
$validName=trim($userInputUsername);
//to eliminate the extra white space from the user input to avoid the trouble in user validation

echo"--implode--<br>";
$product = array("Electronic", "Clothing", "Books");
$categories = implode(" ", $product);
echo "Available Categories: $categories<br><br>";
//to convert the array into string

echo"--explode--<br>";
$productNamesString = "Smartphone Laptop Camera Headphones";
$productNamesArray = explode(" ", $productNamesString);
echo "Available Products:\n";
foreach ($productNamesArray as $productName) {
    echo ", $productName";}
    echo"<br><br>";

//convert the string into array

echo"--htmlspecialchar--<br>";
$userInputDescription = "<strong> best Product!</strong> ";
$safeDescription = htmlspecialchars($userInputDescription);
echo "Product Description:\n$safeDescription<br><br>";
//converts special characters to html entities

echo"--htmlentities--<br>";
$userInput = '<script>coool</script>';
$safeInput = htmlentities($userInput);
echo "User Input:$safeInput<br><br>";
// to prevent Cross-Site Scripting  attacks by ensuring 
//that user-generated content doesn't include executable code when displayed in a web pag

echo"--str repeat--<br>";
$productName = "fan";
$stockQuantity = 8;

$stockIndicator = str_repeat("■", $stockQuantity);

echo "Product: $productName<br>";
echo "Stock: $stockIndicator<br><br>";
//we can also use str repeat to show the users review in star format


echo"--reverse function--<br>";
$text="this is confidential";
$encryptText=strrev($text);

echo"the encrpted text is $encryptText<br><br>";
//we can encrpt the message by using  reverse function

echo"--str shuffle--<br>";
$characters="bbkjax bxashvsbhs";
$randomPassword=str_shuffle($characters);
echo" randomly generated password is $randomPassword <br><br>";
//we can use this function to randomly generate password

echo"--str split--<br>";
$cardNumber="1234-5678";
$onlylNumber=str_replace("-","",$cardNumber);
$number=str_split($onlylNumber);
if(count($number)==8){
    echo"valid number<br><br>";
}
else{
    echo "invalid number";
}
//converts string into array

echo"--substr replace--<br>";
$productCode="xx562bsh3";
$updatedCode=substr_replace($productCode,"www",0,3);
echo"so now the updated code is $updatedCode<br><br>";
//can use this function to replace certain part of the string with starting position and length

echo'--str pad--<br>';
$productId="123";
$paddedId=str_pad($productId,5,"0",STR_PAD_RIGHT);
echo"so now new paddedid is $paddedId <br><br>";
//to ensure that string have mention length or we can also use in time for example
//in single digit time we can add 0 at top pad left

echo'--strscpn--<br>';
$text="you are such a nice guy";
$offenciveText=strcspn($text,"nice");

if($offenciveText===0){
echo "use respectful words in the comment box";

}
else{
    echo"pass the comment<br><br>";
}
//can use this function to check if there are any offencive word are used in the
//product review 

echo"--ucword--";
$firstName=bhavya;
$useUcword=ucword($firstName);
echo"$useUcword";
//it capitalize every words first character in the string

echo"--ucfirst--";
$userName1="bhavya bahah bhah";
$newString=ucfirst($userName);
echo"new string:$newString";
//it capitalize first character of the string
?>
