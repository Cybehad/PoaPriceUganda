<?php

namespace Product;

class ProductSubCollection extends ProductCollection
{
    private static $db_table = "ppu_product_sub_collection";
    private static $db_table_fields = array('coll_id','sub_coll_name','sub_coll_description');
    protected $id;
    protected $coll_id;
    public $sub_coll_name;
    public $sub_coll_description;
    public $deleted;
    public $create_date;

    public function set_sub_coll_id(int $id){
        $this->id = $id;
    }
    public function get_sub_coll_id(){
        return $this->id;
    }
}