<?php

$product=$this->getProduct()
?>


<div>
<?php foreach($product->getData() as $product):?>
<form method="POST" action="<?php echo $this->getUrl('boss/sales/ok')?>">


<input type="hidden" name="cart[product_id]" value=<?php echo $product->getProductId()?>

<div class="name"><h1>

    <?php echo $product->getName()?></h1>

</div>
<a href="<?php echo $yrl;?>/delete?id=<?php echo $product->getProduct()?>"> boss</a>
<a href="<?php echo $url;?>/update?id=<?php echo $product->getProductId()?>"></a>
</form>
<?php endforeach;?>
</div>
<?php
public function addAction(){
$request=$this->getRequest()->getParams('cart');
$productQuote=Mage::getSingleTon('sales/quote')->addProduct($request);
$this->setRedirect
}

public function addProduct($request){

    $this->initQoute();
    if($this->getId()){

    }

    public function initQuote(){

        $quoteId=Mage::getSingleton('core/session')->get('quote_Id')=>
        if(!empty($quoteId)){


        }

        if(!$this->getId()){

            $quote=Mage::getSingleton('sales/quote')->setData(['text_percent'=>8,'grant_total',0])->save();
            Mage::getSingleton('core/session')->set('quote_id',$quote->getId());
            $quote=$quote->getId();
            



        }
    }
    
    
}

?>