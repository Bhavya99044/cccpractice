<?php
//basic arithmatic
//absolute
$temperature=34;
$currentTemperature=30;
$tempDif=$currentTemperature-$temperature;
echo"the difference between the temperature is $tempDif<br><br>";
//to show temperature diff in absolute value

echo"--ceil,floor,round function--";
$price=23.40;
$roundUpPrice=ceil($price);
$roundDownPrice=floor($price);
$nearestPrice=round($price,0);
echo"round up price :$roundUpPrice<br><br>";
echo"round down price: $roundDownPrice<br><br>";
echo"nearest price:$nearestPrice<br><br>";
//can use these functions in ecommerce for price

echo"--power function--";
$userReviews = [4, 5, 3, 4, 5];

$averageRatingSqrt = sqrt(array_sum($userReviews) / count($userReviews));

$weightedAverageRating = pow(array_sum($userReviews), 2) / count($userReviews);

echo" average rating=$averageRatingSqrt<br>";
echo"weightedAverage rating:$weightedAverageRating<br><br>";
//for user reviews we can use

//random number
$userId = rand(3,8);
echo"user id : $userId";
//to generate the random id for the users

//fomat function
$currency=52627818;
$fomattedCurrency=number_format($currency,2);
echo "$formattedCurrency";
//can use to deplay currency in formatted form
?>