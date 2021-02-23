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

$staff_code = e($_POST['code']);
$staff_name = e($_POST['name']);
$staff_pass = e($_POST['pass']);

$dbh = get_Db();
$sql = "update mst_staff set name = :name, password = :password where code = :code";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':name', $staff_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $staff_pass, PDO::PARAM_STR);
$stmt->bindValue(':code', $staff_code, PDO::PARAM_INT);
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
    <p><?php print $staff_name.'さんを修正しました'; ?></p>
    <a href="staff_list.php">戻る</a>
</body>
</html>