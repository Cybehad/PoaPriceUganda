<?php


namespace User;


class User extends Login
{
    protected static $db_table = "ppu_user_details";
    protected static $db_table_fields = array('user_id', 'first_name', 'nick_name', 'last_name', 'nick_name', 'dob', 'phone', 'address1', 'address2', 'suits', 'city', 'country');

    public $user_id;
    public $first_name;
    public $nick_name;
    public $last_name;
    public $dob;
    public $phone;
    public $address1;
    public $address2;
    public $suits;
    public $city;
    public $country;
    
    public final function registerUser(){
        global $database;
        $register = new namespace\Login();
        $register->username = $this->username;
        $register->email = $this->email;
        $register->password = $this->password;
        $register->salt = $this->salt;
        $register->agreed = $this->agreed;
        if ($register->save()) {
            return true;
        }
        return false;
    }


}