<?php

namespace Db;

class DbConnect extends \Core\Obj
{
    protected $dbc;

    public function __construct($host, $user, $pwd, $db)
    {
        try {
            $this->dbc = @new \mysqli($host, $user, $pwd, $db);
        }catch (\RuntimeException $e){
            echo "Error: Can not access database! ".$e;
            return false;
        }
    }

    public function query($sql)
    {
        $result = $this->dbc->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    public function confirm_query($result)
    {
        global $local;
        if (!$result) {
            if (!$local) return false;
            die("Query failed" . $this->dbc->error);
        }
    }

    public function escape_string($string)
    {
        return $this->dbc->real_escape_string($string);
    }

    public function last_insert_id()
    {
        return mysqli_insert_id($this->dbc);
    }
}