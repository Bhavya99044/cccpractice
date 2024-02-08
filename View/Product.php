<?php
class View_Product
{
    public function __construct()
    {

    }

    public function createForm()
    {
        $form = '<form action="" method="POST">';
        $form .= '<div>';
        $form .= $this->createTextField('pdata[product_name]', "Product Name: ");
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createTextField('pdata[sku]', "Sku: ");
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createTextField('pdata[price]', "Price: ");
        $form .= '</div>';
        $form .= '<div>';
        $form .= $this->createTextField('pdata[manufacturer_cost]', "Cost: ");
        $form .= '</div>';
            
        $form .= '<div>';
        $form .= $this->createSubmitBtn('Submit');
        $form .= '</div>';
        $form .= '</form>';
        return $form;
    }

    public function createTextField($name, $title, $value = '', $id = '')
    {
        return '<span> ' . $title . ' </span><input id="' . $id . '" type="text" name="' . $name . '" value="' . $value . '">';
    }
   
    public function createSubmitBtn($title)
    {
        return '<input type="submit" name="submit" value="'.$title.'">';
    }

    public function toHtml()
    {
        echo "sss";
    }
}
