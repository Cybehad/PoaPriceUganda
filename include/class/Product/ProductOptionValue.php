<?php

namespace Product;

class ProductOptionValue extends ProductOptions {

    private static $db_table = "ppu_product_option_values";
    protected static $db_table_fields = array('pdt_id', 'option_value_name');
//    protected $id;
    public $option_id;
    public $option_value_name;

//    public $deleted;
//    public $create_date;

//    public function save(ProductOptions $options, String $op_name, $last_insert_id, String $op_value) {
//        global $database;
//        $options->pdt_id = (int) $last_insert_id;
//        $options->option_name = $database->escape_string($op_name);
//        //Options saved
//        if ($options->save()) {
//            $this->option_id = $database->ast_insert_id();
//            $this->option_value_name = $database->escape_string($op_value);
//            parent::save();
//            //Save option values
//        }
//        return false;
//    }

}
