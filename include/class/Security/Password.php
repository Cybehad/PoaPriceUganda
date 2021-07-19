<?php

namespace Security;

class Password
{
    public final static function checkStrLen($string, int $len){
        if (strlen($string) != $len) {
            return false;
        }
    }
}