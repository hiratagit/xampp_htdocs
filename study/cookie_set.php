<?php

setcookie('email', 'sample@sample.com', (time() + 60*60*24*30));

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>クッキーの練習</h1>
    <a href="cookie_check.php">次のページへ</a>
    <a href="cookie_delete.php">クッキーの削除</a>
</body>
</html>