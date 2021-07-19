<?php


namespace Product;


class ProductCollection extends \Asset\Asset
{
    private static $db_table = "ppu_product_collection";
    private static $db_table_fields = array('coll_name','coll_description');
//    protected $id;
    protected $asset_id;
    public $coll_name;
    public $coll_description;
//    public $deleted;
//    public $create_date;

    public function set_coll_id(int $id){
        $this->id = $id;
    }
    public function get_coll_id(){
        return $this->id;
    }
}