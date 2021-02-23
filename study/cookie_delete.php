<?php
setcookie('email', '', time() -3600);

var_dump($_COOKIE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>クッキーの削除</h1>
    <a href="cookie_set.php">戻る</a>
</body>
</html>