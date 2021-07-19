<?php


namespace Product;

class ProductImages extends Product
{
    protected static $db_table = "ppu_products_images";
    private static $db_table_fields = array('pdtId','pdtImage');
    public $pdtId;
    public $pdtImages;
}