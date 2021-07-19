<?php


namespace Product;


class ProductVariants extends ProductOptions
{
    private static $db_table = "ppu_product_variants";
    private static $db_table_fields = array('option_id', 'variant_name');
//    protected $id;
    public $option_id;
    public $variant_name;
//    public $deleted;
//    public $create_date;
}