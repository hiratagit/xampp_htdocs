<?php


session_start();

$_SESSION = [];

$session_name = session_name();

if(isset($_COOKIE[$session_name])) {
    setcookie($session_name, '', time()-3600);
}

session_destroy();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>セッションの破棄</h1>
    <p><a href="session_set.php">戻る</a></p>
    <p><a href="session_next.php">次</a></p>
</body>
</html>