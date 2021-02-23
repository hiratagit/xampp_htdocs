<?php

require_once 'config.php';

session_start();

$_SESSION = [];
$session_name = session_name();  //PHPSESSID

if(isset($_COOKIE[$session_name])) {
    setcookie($session_name, '', time()-3600);
}
session_destroy();

header('Location:'.SITE_URL.'login.php');