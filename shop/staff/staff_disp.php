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

$staff_code = $_GET['staffcode'];
$dbh = get_Db();

$sql = "select name from mst_staff where code = :code";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':code', $staff_code, PDO::PARAM_STR);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$staff_name = $rec['name'];

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
    <h2>スタッフ情報参照</h2>
    <p>スタッフコード:<?php print e($staff_code); ?></p>
    <p>スタッフ名:<?php print e($staff_name);?></p>
    <input type="button" onclick="history.back()" value="戻る"><br/>
    </form>
</body>
</html>