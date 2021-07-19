<?php

namespace User;

class Log extends Login
{
    protected static $db_table = "ppu_login_log";
    protected static $db_table_fields = array('user_id','ip_address','ip_address2','user_agent');
    public $user_id;
    public $ip_address;
    public $ip_address2;
    public $user_agent;

    public static function create_log($id, $ip_address, $ip_address2, $user_agent): bool
    {
        global $database;
        $log = new namespace\Log();
        $log->user_id = $database->escape_string($id);
        $log->ip_address = $database->escape_string($ip_address);
        $log->ip_address2 = $database->escape_string($ip_address2);
        $log->user_agent = $database->escape_string($user_agent);
        if ($log->save()) return true;
        return false;
    }
}