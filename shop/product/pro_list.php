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
    <form action="pro_branch.php" method="post">
    <?php foreach($data as $rec) : ?>
      <p><input type="radio" name="procode" 
         value="<?php print $rec['code']; ?>"><?php print $rec['name']; ?>... <?php print $rec['price'];?> 円</p>
    <?php endforeach; ?>
    <input type="submit" name="disp" value="参照">
    <input type="submit" name="add" value="追加">
    <input type="submit" name="edit" value="修正">
    <input type="submit" name="delete" value="削除">
    </form>
    <p><a href="../staff_login/staff_top.php">トップメニューへ</a></p>
</body>
</html>