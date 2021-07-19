<?php


namespace User;


class LogOut extends \Auth\Session
{
    public static function Logout(){
        if (isset($_SESSION['user_id']) || isset($_SESSION['username']))
            self::wipe_sessions();
    }
}