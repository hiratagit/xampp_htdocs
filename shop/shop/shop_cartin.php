<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['member_login'])) {
    print 'ようこそゲスト様 ';
    print '<p><a href="member_login.php">会員ログイン</a></p>';
} else {
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様';
    print '<a href="member_logout.php">ログアウト</a><br><br>';
} 

$pro_code = $_GET['procode'];

if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];

    if(in_array($pro_code, $cart)) {
        print '<br>その商品はすでにカートに入っています<br>';
        print '<a href="shop_list.php">商品一覧に戻る</a><br><br>';
        exit();
    }
}
$cart[] = $pro_code;
$kazu[] = 1;
$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;  

foreach($cart as $key => $val) {
    print $val.'<br>';
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

    <p>カートに追加しました</p>
    <p><a href="shop_list.php">商品一覧に戻る</a></p>
</body>
</html>