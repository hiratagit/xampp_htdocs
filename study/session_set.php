<?php

session_start();
$_SESSION['profile'] = ['user_name' => 'taro', 'location' => '関東'];
$_SESSION['cart']['desk_01'] = 3;
$_SESSION['cart']['chair_07'] = 5;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>セッションの練習</h1>
    <p><a href="session_check.php">次のページへ</a></p>
    <p><a href="session_delete.php">セッションデータ削除</a></p>
</body>
</html>