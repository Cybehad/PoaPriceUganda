<?php

namespace Product;

class Product extends \Asset\Asset {

    private static $db_table = "ppu_products";
    private static $db_table_fields = array('user_id', 'asset_id', 'coll_id', 'sub_coll_id', 'pdt_name', 'pdt_price', 'pdt_image', 'pdt_description', 'pdt_visibility', 'pdt_create_date');
//    protected $id;
//    public $user_id;
    protected $asset_id;
    public $coll_id;
    public $sub_coll_id;
    public $pdt_name;
    public $pdt_price;
    public $pdt_image;
    public $pdt_description;
    public $pdt_visibility;
    public $pdt_create_date;

//    public $deleted;
//    public $create_date;
    public function __construct(
            $userid = '', $assetId = '', $collId = '',
            $subCollId = '',
            $pdtName = '', $price = '',
            $pdtDescription = '',
            $pdtVisibility = '', $pdtCreate_date = '') {
        if (!empty($userid)) {
            $this->user_id = (int) $userid;
            $this->asset_id = (int) $assetId;
            $this->coll_id = (int) $collId;
            $this->sub_coll_id = (int) $subCollId;
            $this->pdt_name = $pdtName;
            $this->pdt_price = (int) $price;
//            $this->pdt_image = $image->image_name;
            $this->pdt_description = $pdtDescription;
            if ($pdtVisibility === 0 || $pdtVisibility == 1) {
                $this->pdt_visibility = (int) $pdtVisibility;
            }
            $this->pdt_create_date = $pdtCreate_date;
        }
    }

    public final function productSave(
            array $files, int $limit,
            ProductOptions $option, String $op_name,
            ProductOptionValue $optionValue, String $op_value
    ) {
        global $database;
        if (!$image = \Data\Photo\MultipleUpload::MultipleUpload($files, $limit)) return false;
        $this->pdt_image = $image::$image_name;
        if (!parent::save()) {return false;}
        $option->pdt_id = (int) $database->last_insert_id;
        $option->option_name = $database->escape_string($op_name);
        $optionValue->option_value_name = $database->escape_string($op_value);
        if($option->save() && $optionValue->save()){ return true;}
        return false;
    }

}
