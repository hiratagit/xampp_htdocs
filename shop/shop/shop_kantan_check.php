<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';

session_start();
session_regenerate_id(true);
if(!isset($_SESSION['member_login'])) {
    print 'ログインされていません。';
    print '<a href="shop_list.php">商品一覧へ</a>';
    exit();
}

$code = $_SESSION['member_code'];

$dbh = get_Db();
$sql = 'select name, email, postal1, postal2, address, tel from dat_member where code = :code';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':code', $code, PDO::PARAM_INT);
$stmt->execute();
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$dbh = null;

$onamae = $rec['name'];
$email = $rec['email'];
$postal1 = $rec['postal1'];
$postal2 = $rec['postal2'];
$address = $rec['address'];
$tel = $rec['tel'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>お名前：<?php print $onamae; ?></p>
    <p>メール：<?php print $email; ?></p>
    <p>郵便番号：<?php print $postal1; ?> - <?php print $postal2; ?></p>
    <p>ご住所：<?php print $address; ?></p>
    <p>電話番号：<?php print $tel; ?></p>

    <form method="post" action="shop_kantan_done.php">
        <input type="hidden" name="onamae" value="<?php print $onamae; ?>">
        <input type="hidden" name="email" value="<?php print $email; ?>">
        <input type="hidden" name="postal1" value="<?php print $postal1; ?>">
        <input type="hidden" name="postal2" value="<?php print $postal2 ?>">
        <input type="hidden" name="address" value="<?php print $address; ?>">
        <input type="hidden" name="tel" value="<?php print $tel; ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK"><br>
    </form>
</body>
</html>