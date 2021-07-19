<?php
 spl_autoload_register('classAutoLoad');
 function classAutoLoad($className){
     global $CLASS_DIR;
     $path = str_replace('\\', '/', "/var/www/ppu/include/class" .DS. $className.".php");
     if(file_exists($path)){
         require_once $path;
     }else{
         die('The '.$className.' does not exist!   '.$path);
     }
 }