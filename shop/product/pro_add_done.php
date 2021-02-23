<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['login'])) {
    print 'ログインされていません<br/>';
    print '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit();
}

$pro_name = e($_POST['name']);
$pro_price = e($_POST['price']);
$pro_gazou_name = e($_POST['gazou_name']);

$dbh = get_Db();
$sql = "insert into mst_product (name, price, gazou) values (:name, :price, :gazou)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':name', $pro_name, PDO::PARAM_STR);
$stmt->bindValue(':price', $pro_price, PDO::PARAM_INT);
$stmt->bindValue(':gazou', $pro_gazou_name, PDO::PARAM_STR);
$stmt->execute();

$dbh = null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php print $pro_name.'を追加しました'; ?></p>
    <a href="pro_list.php">戻る</a>
</body>
</html>





