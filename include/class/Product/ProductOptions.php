<?php


namespace Product;


class ProductOptions extends \Core\Obj
{
    private static $db_table = "ppu_product_options";
    private static $db_table_fields = array('pdt_id', 'option_name');
//    protected $id;
    public $pdt_id;
    public $option_name;
//    public $deleted;
//    public $create_date;
    
}