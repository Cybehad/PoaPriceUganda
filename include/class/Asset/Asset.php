<?php


namespace Asset;


class Asset extends \Core\Obj
{
    private static $db_table = "ppu_asset";
    private static $db_table_fields = array('user_id','asset_name','asset_image','asset_description');
//    protected $id;
    public $user_id;
    public $asset_name;
    public $asset_image;
    public $asset_description;
    public $deleted;
    public $create_date;

}