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
$stmt->bindValue(':code', $pro_code, PDO::PARAM_STR);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$pro_name = $rec['name'];
$pro_price = $rec['price'];
$pro_gazou_name = $rec['gazou'];

$dbh = null;

if(isset($pro_gazou_name)) {
    $disp_gazou = '<img src="./gazou/'.$pro_gazou_name.'">'."</br>\n";
} else {
    $disp_gazou = "";
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
    <h2>商品情報参照</h2>
    <p>商品コード:<?php print e($pro_code); ?></p>
    <p>商品名:<?php print e($pro_name);?></p>
    <p>価格:<?php print e($pro_price);?>円</p>
    <?php print $disp_gazou; ?>
    <input type="button" onclick="history.back()" value="戻る"><br/>
    </form>
</body>
</html>