<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';

$member_email = e($_POST['email']);
$member_pass = e($_POST['pass']);

$member_pass = md5($member_pass);

$dbh = get_Db();
$sql = "select code, name from dat_member where email = :email and password = :pass";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':email', $member_email, PDO::PARAM_STR);
$stmt->bindValue(':pass', $member_pass, PDO::PARAM_STR);
$stmt->execute();
$dbh = null;

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

if($rec === false) {
    print '入力間違いがあります。';
    print '<a href="member_login.php">戻る</a>';
    exit();
} else {
    session_start();
    $_SESSION['member_login'] = 1;
    $_SESSION['member_code'] = $rec['code'];
    $_SESSION['member_name'] = $rec['name'];
    header('Location:shop_list.php');
    exit();
}
