<?php

session_start();
$_SESSION = [];
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
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
    <p>カートを空にしました</p>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>

</body>
</html>