<?php
session_start();

define('host', 'localhost');
define('dbname', 'project');
define('user', 'root');
define('password', '');

define('SITE_URL', 'http://localhost/project/');

include_once "config/DatabaseConnection.php";

$db = new DatabaseConnection;

include "code/authentication_code.php";

function base_url($slug){
    echo SITE_URL.$slug;
}

function redirect($message, $slug){
    $redirectTo = SITE_URL.$slug;
    $_SESSION['message'] = $message;
    header("location: $redirectTo");
    exit(0);
}

function validateInput($dbcon, $input){
    return mysqli_real_escape_string($dbcon, $input);
}

?>
