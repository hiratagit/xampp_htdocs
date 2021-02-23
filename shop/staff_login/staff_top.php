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
    <p><?=$_SESSION['staff_name'] ?>さん、ログイン中</p>
    <h2>ショップ管理トップメニュー</h2>
    <p><a href="../staff/staff_list.php">スタッフ管理</a></p>
    <p><a href="../product/pro_list.php">商品管理</a></p>
    <p><a href="../order/order_download.php">注文ダウンロード</a></p>
    <p><a href="staff_logout.php">ログアウト</a></p>
</body>
</html>