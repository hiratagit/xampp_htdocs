<?php
require_once '../helpers/extra_helpers.php';

session_start();
session_regenerate_id(true);

$post = sanitize($_POST);

$max = $post['max'];
$cart = $_SESSION['cart'];


for($i=0; $i < $max; $i++) {

    if(!preg_match("/\A[0-9]+\z/", $post['kazu'.$i])) {
        print '数量に誤りがあります<br>';
        print '<a href="shop_cartlook.php">カートに戻る</a>';
        exit();
    }

    if($post['kazu'.$i] < 1 || 10 < $post['kazu'.$i]) {
        print '数量は1～10個までです<br>';
        print '<a href="shop_cartlook.php">カートに戻る</a>';
        exit();
    }

    $kazu[] = $post['kazu'.$i];
}

for($i=$max; 0<=$i; $i--) {
    if(isset($_POST['sakujo'.$i])) {
        array_splice($cart, $i, 1);
        array_splice($kazu, $i, 1);
    }
}

$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;
header('Location:shop_cartlook.php');
exit();

?>


