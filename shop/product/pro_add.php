<?php

session_start();
session_regenerate_id(true);
if(!isset($_SESSION['login'])) {
    print 'ログインされていません<br/>';
    print '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>商品追加</h2>
    <form action="pro_add_check.php" method="post" enctype="multipart/form-data">
    
    <p>商品名を入力してください</p>
    <p><input type="text" name="name" style="width: 200px;"></p>
    <p>価格を入力してください</p>
    <p><input type="text" name="price" style="width: 100px;"></p>
    <p>画像を選んでください</p>
    <p><input type="file" name="gazou" style="width: 400px;"></p>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
    </form>
</body>
</html>