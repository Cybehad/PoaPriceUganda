<?php


namespace Product;


class ProductVariantValue extends ProductVariants
{
    private static $db_table = "ppu_product_variant_value";
    private static $db_table_fields = array('variant_id', 'variant_value_name');
//    protected $id;
    public $variant_id;
    public $variant_value_name;
//    public $deleted;
//    public $create_date;
}