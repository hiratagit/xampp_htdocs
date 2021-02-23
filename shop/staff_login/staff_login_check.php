<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';

$staff_code = e($_POST['code']);
$staff_pass = e($_POST['pass']);

$staff_pass = md5($staff_pass);

$dbh = get_Db();
$sql = "select name from mst_staff where code = :code and password= :pass";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':code', $staff_code, PDO::PARAM_INT);
$stmt->bindValue(':pass', $staff_pass, PDO::PARAM_STR);
$stmt->execute();
$dbh = null;

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

if($rec === false) {
    print '入力に誤りがあります';
    print '<a href="staff_login.php">戻る</a>';
    exit();
} else {
    session_start();
    $_SESSION['login'] = 1;
    $_SESSION['staff_code'] = $staff_code;
    $_SESSION['staff_name'] = $rec['name'];
    header('Location:staff_top.php');
    exit();
}

