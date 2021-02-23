<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['member_login'])) {
    print 'ログインされていません<br/>';
    print '<a href="member_login.php">会員ログイン画面へ</a>';
} else {
    print 'ようこそ';
    print $_SESSION['member_name'];
    print '様';
    print '<p><a href="member_logout.php">ログアウト</a></p>';
}

$dbh = get_Db();
$sql = "select code, name, price from mst_product where 1";
$stmt= $dbh->prepare($sql);
$stmt->execute();

$dhb = null;

$data = [];
while($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $rec;
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
    <h2>商品一覧</h2>
    <?php foreach($data as $rec) : ?>
    <p>
        <a href="shop_product.php?procode=<?php print $rec['code'];?>">
        <?php print $rec['name']; ?>---<?php print $rec['price'];?> 円
        </a>
    </p>
    <?php endforeach; ?>
    <p><a href="shop_cartlook.php">カートを見る</a></p>
</body>
</html>