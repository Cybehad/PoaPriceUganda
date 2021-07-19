<?php
date_default_timezone_set("Africa/Nairobi");
$scriptName = basename($_SERVER['PHP_SELF']);
$whitelist = array('127.0.0.1','::1');
$full_url = "http" . (!empty($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['SERVER_NAME']. $_SERVER['REQUEST_URI'];
if(in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    $local = TRUE;
    $debug = TRUE;
    define("SECURE", FALSE);
}else{
    $local = false;
    $debug = false;
    define("SECURE", true);
}

if ($local){include_once "local.config.php";}else{include_once "live.config.php";}