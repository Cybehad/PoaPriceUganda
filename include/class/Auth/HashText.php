<?php

namespace Auth;

class HashText
{
    public function __construct(){

    }
    public static function hashText($text_1, $text_2){
        if (!empty($text_1) && !empty($text_2)){
            return sha1($text_1.$text_2);
        }
        return false;
    }
    public static function hashText512($text_1, $text_2){
        if (!empty($text) && !empty($text_2)){
            return hash('512', $text_1, $text_2);
        }
        return '';
    }
    public final static function genRandom(){
        return hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
    }
}