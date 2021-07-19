<?php

namespace Writer;

abstract class ProductWriter extends Product
{
    protected $products = array();
    public function addProduct( Product $shopProduct ) {
        $this->products[]=$shopProduct;
    }
    abstract public function write();

}