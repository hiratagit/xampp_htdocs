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

$pro_code = $_GET['procode'];
$dbh = get_Db();

$sql = "select name, price, gazou from mst_product where code = :code";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':code', $pro_code, PDO::PARAM_INT);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_price = $rec['price'];
$pro_gazou_name_old = $rec['gazou'];

$dbh = null;

if($pro_gazou_name_old != "") {
    $disp_gazou = '<img src="./gazou/'.$pro_gazou_name_old.'">'."</br>\n";
} else {
    $disp_gazou = "";
    $pro_gazou_name_old = "";
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
    <h2>商品修正</h2>
    <p>商品コード:<?php print e($pro_code); ?></p>
    <form action="pro_edit_check.php" method="post" enctype="multipart/form-data">

    <input type="hidden" name="code" value="<?php print e($pro_code); ?>">
    <input type="hidden" name="gazou_name_old" value="<?php print e($pro_gazou_name_old); ?>">
    <p>商品名</p>
    <input type="text" name="name" style="width: 200px;" value="<?php print e($pro_name); ?>"></br>
    <p>価格</p>
    <input type="text" name="price" style="width: 100px;" value="<?php print e($pro_price); ?>">円</br></br>
    <?php print $disp_gazou; ?>
    <input type="file" name="gazou" style="width: 400px;"><br/>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
    </form>
</body>
</html>