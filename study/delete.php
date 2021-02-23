<?php

session_start();
$session_name = session_name();
$_SESSION = [];

if(isset($_COOKIE[$session_name])) {
    setcookie($session_name, '', time() - 3600);
}

session_destroy();
header('Location: cart.php');
exit();

?>