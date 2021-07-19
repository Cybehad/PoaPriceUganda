<?php


namespace User;


class LoginVerified extends Login
{
    protected static $db_table = "ppu_login_verified";
    protected static $db_table_fields = array('user_id','email_verified','password_verified');
    public $user_id;
    public $email_verified;
    public $phone_verified;
}