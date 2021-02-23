<?php
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
$pro_gazou = $_FILES['gazou'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

$flag = true;

if($pro_name === '') {
    print '商品名が入力されていません<br>';
    $flag = false;
} else {
    print 'スタッフ名:';
    print $pro_name;
    print '<br>';
}

if(!preg_match('/\A[0-9]+\z/', $pro_price)) {
    print '価格を正しく入力してください';
    $flag = false;
} else {
    print '価格:';
    print $pro_price;
    print '<br>';
}

if($pro_gazou['size'] > 0) {
    if($pro_gazou['size'] > 1000000) {
        print '画像が大きすぎます';
        $flag = false;
    } else {
        move_uploaded_file($pro_gazou['tmp_name'], './gazou/'.$pro_gazou['name']);
        print '<img src="./gazou/'.$pro_gazou['name'].'">'."</br>\n";
    }
}


if(!$flag) {
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
} else {

    print '<p>上記の商品を追加します</p>'."\n";
    print '<form method="post" action="pro_add_done.php">'."\n";
    print '<input type="hidden" name="name" value="'.$pro_name.'">'."\n";
    print '<input type="hidden" name="price" value="'.$pro_price.'">'."\n";
    print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">'."\n";
    print '<br>';
    print '<input type="button" onclick="history.back()" value="戻る">'."\n";
    print '<input type="submit" value="OK">';
}
?>
</body>
</html>




