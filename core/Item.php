<?php

namespace Geevic;

class Item
{
    public $product_id;
    public $product_name;
    public $price;
    public $detail;

    function __construct($product_id, $product_name, $price, $detail)
    {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->price = $price;
        $this->detail = $detail;
    }
}
