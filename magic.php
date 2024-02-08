<?php

include "Lib/Autoload.php";
$request=new Model_Request();
if(!$request->isPost()){
    $product=new View_product();
    echo $product->toHtml();

}
else{
    $product=new Model_Product();
    $product->save($request->getParams('pdata'));
}
?>