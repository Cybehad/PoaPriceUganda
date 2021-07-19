<?php
namespace Core;

class Obj
{
    private static $db_table = '';
    private static $db_table_fields = array();
    protected $id ='';

    /////////////////////////////////////////////////////////////////////////////////
    public static function find_all($desc=null): array
    {
        $sql = ' ORDER BY Id ASC';
        if ($desc) $sql = " ORDER BY Id DESC";
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ".$sql);
    }

    public static function find_by_id($id)
    {
        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id={$id} LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    ///////////////////////////////////////////////////////////////////
    public static function find_by_query($sql)
    {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();
        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantiate($row);
        }
        return $the_object_array;
    }
    //instantiating objects...
    public static function instantiate($found_user)
    {
        $calling_class = get_called_class();
        $object = new $calling_class;

        foreach ($found_user as $the_attribute => $value) {
            if ($object->has_the_attribute($the_attribute)) {
                $object->$the_attribute = $value;
            }
        }
        return $object;
    }

    private function has_the_attribute($the_attribute)
    {
        //store all properties from an object;
        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);
    }

    protected function properties()
    {
        $properties = array();
        foreach (static::$db_table_fields as $table_field) {
            if (property_exists($this, $table_field)) {
                $properties[$table_field] = $this->$table_field;
            }
        }
        return $properties;
    }

    protected function clean_properties()
    {
        global $database;
        $clean_properties = array();
        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }
        return $clean_properties;
    }

    public function create()
    {
        global $database;
        $properties = $this->clean_properties();
        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) . "')";
        if ($database->query($sql)) {
            $this->id = $database->last_insert_id();
            return true;
        } else {return false;}
    }

    public function update()
    {
        global $database;
        $properties = $this->clean_properties();
        foreach ($properties as $key => $value) {
            $properties_pairs[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " . static::$db_table . " SET ". implode(",", $properties_pairs);
        $sql .= " WHERE id=" . $database->escape_string($this->id);
        $database->query($sql);
        return mysqli_affected_rows($database->dbc) == 1;
    }

    public function delete_safe($id=''){
        global $database;
        $sql = "UPDATE " . static::$db_table . " SET  deleted = 1";
        $sql .= " WHERE id=" . $database->escape_string($this->id);
        $database->query($sql);
        return mysqli_affected_rows($database->dbc) == 1;
    }
    public function delete()
    {
        global $database;
        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql .= " WHERE id= " . $database->escape_string($this->id);
        $sql .= " LIMIT 1";
        $database->query($sql);
        return mysqli_affected_rows($database->dbc) == 1;
    }

    public function save()
    {
        return isset($this->id) ? $this->update() : $this->create();
    }

    public static function count_all()
    {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
    }
    ///////////////////////////////////////////////////////////

    final public function setId(int $id){
        if (is_numeric($id)){
            $this->id = (int)$id;
        }
    }

    final public function getId(){
        return $this->id;
    }
}