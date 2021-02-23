<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['member_login'])) {
    print 'ようこそゲスト様 ';
    print '<a href="member_login.php">会員ログイン</a>';
} else {
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様';
    print '<a href="member_logout.php">ログアウト</a><br><br>';
}

if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $max = count($cart);
} else {
    $max = 0;
}

if($max === 0) {
    print '<br>カートには商品が入っていません。<br><br>';
    print '<a href="shop_list.php">商品一覧へ戻る</a>';
    exit();
}

$dbh = get_Db();

foreach($cart as $key => $val) {

    $sql = "select code, name, price, gazou from mst_product where code = :code";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':code', $val, PDO::PARAM_INT);
    $stmt->execute();

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name[] = $rec['name'];
    $pro_price[] = $rec['price'];
    if($rec['gazou'] === '') {
        $pro_gazou[] = '';
    } else {
        $pro_gazou[] = '<img src="../product/gazou/'.$rec['gazou'].'">';
    }

}

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
    <p>カートの中身</p>
    <form method="post" action="kazu_change.php">
    <table border="1">
    <tr>
        <th>商品</th>
        <th>商品画像</th>
        <th>価格</th>
        <th>数量</th>
        <th>小計</th>
        <th>削除</th>
    </tr>
    
   
    <?php for($i = 0; $i < $max; $i++) : ?>
    <tr>
        <td><?php print $pro_name[$i]; ?></td>
        <td><?php print $pro_gazou[$i]; ?></td>
        <td><?php print $pro_price[$i]; ?>円</td>
        <td><input type="text" name="kazu<?php print $i; ?>" value="<?php print $kazu[$i]; ?>"></td>
        <td>合計金額：<?php print $pro_price[$i] * $kazu[$i]; ?>円</td>
        <td><input type="checkbox" name="sakujo<?php print $i; ?>"></td>
    </tr>
    <?php endfor; ?>
    </table>
        <input type="hidden" name="max" value="<?php print $max; ?>"><br>
        <input type="submit" value="数量変更"><br>
        <input type="button" onclick="history.back()" value="戻る"><br/>
    </form>
        <p><a href="shop_list.php">商品一覧へ</a></p>
        <p><a href="shop_form.html">ご購入手続きへ進む</a></p>
    <?php if(isset($_SESSION['member_login'])) : ?>
        <a href="shop_kantan_check.php">会員かんたん注文へ進む</a>
    <?php endif; ?>

</body>
</html>