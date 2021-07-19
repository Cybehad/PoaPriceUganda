<?php


namespace User;


use Security\Validate;

class Notify
{
    public static function msg_redirect($msg='', $redirect=''){
        global $url;
        if (!empty($msg)) self::create_instant_msg($msg);
        if (!empty($redirect)) {
            self::redirect($redirect);
        }
        else {
            self::redirect($url);
        }
    }
    private static function create_instant_msg($the_msg){
        if (!empty($the_msg)){
            if (isset($_SESSION['the_msg'])){
                $_SESSION['the_msg'] .=  strip_tags(htmlentities($the_msg));
            }else {
                $_SESSION['the_msg'] = strip_tags(htmlentities($the_msg));
            }
        }
    }
    public static function get_instant_msg(){
        if (isset($_SESSION['the_msg'])) {
            echo $_SESSION['the_msg'];
            unset($_SESSION['the_msg']);
        }
    }
    public static function get_red_url($url=''){
        return str_replace("redirect=","",$_SERVER['QUERY_STRING']);
    }
    private static function redirect($r_location, $time = '')
    {
//        $r_location = Validate::esc_url($r_location);
//        die($r_location);
        header("Location: {$r_location}");
        exit();
    }

    public static function msg(string $string)
    {
        self::create_instant_msg($string);
    }
}