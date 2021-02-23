<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';

$staff_name = e($_POST['name']);
$staff_pass = e($_POST['pass']);

$dbh = get_Db();
$sql = "insert into mst_staff (name, password) values (:name, :password)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':name', $staff_name, PDO::PARAM_STR);
$stmt->bindValue(':password', $staff_pass, PDO::PARAM_STR);
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
    <p><?php print $staff_name.'さんを追加しました'; ?></p>
    <a href="staff_list.php">戻る</a>
</body>
</html>





