<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// local db dbx_connect
const DB_HOST = 'localhost';
const DB_USER = 'root';
const DB_PASS = 'Mc.2417';
const DB_NAME = 'ppu_db';

//local configurations
$url = "http://ppu.local/";
//LOCAL
//APP DIRECTORY CONFIGURATION
$ROOT_PATH = $_SERVER['DOCUMENT_ROOT'];
//INCLUDES PATH
$INCLUDE_DIR = $ROOT_PATH."/include";
//CLASS PATH
$CLASS_DIR = $INCLUDE_DIR . "/class";

define("DS", DIRECTORY_SEPARATOR);
define('SITE_ROOT', $ROOT_PATH);

function my_error_handler($e_number, $e_message, $e_file, $e_line, $e_vars)
{
    global $debug, $contact_email;
    // Build the error message.
    $message = "An error occurred in script '$e_file' on line $e_line: \n<br />$e_message\n<br/>";
    // Add the date and time.
    $message .= "Date/Time: " . date('n-j-Y H:i:s') . "\n<br />";
    // Append $e_vars to the $message.
//    $message .= "<pre>" . print_r($e_vars, 1) . "</pre>\n<br />";
    if ($debug) {
        echo '<p class="error">' . $message . '</p>';
    } else {
        // Log the error:
        error_log($message, 1, $contact_email); // Send email.
        // Only print an error message if the error isn't a notice or strict.
        if (($e_number != E_NOTICE) && ($e_number < 2048)) {
            echo '<p class="error">A system error occurred. We apologize for the inconvenience.</p>';
        }

    }
}
set_error_handler('my_error_handler');