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

$post = sanitize($_POST);
$year = $post['year'];
$month = $post['month'];
$day = $post['day'];

$dbh = get_Db();
$sql = '
select 
ds.code,
ds.date,
ds.code_member,
ds.name as sales_name,
ds.email,
ds.postal1,
ds.postal2,
ds.address,
ds.tel,
dsp.code_product,
msp.name as product_name,
dsp.price,
dsp.quantity
from dat_sales as ds
inner join dat_sales_product as dsp
on ds.code = dsp.code_sales
inner join mst_product as msp
on dsp.code_product = msp.code 
where
substr(ds.date, 1, 4) = :year
and substr(ds.date, 6, 2) = :month
and substr(ds.date, 9, 2) = :day
';
$stmt= $dbh->prepare($sql);
$stmt->bindValue(':year', $year, PDO::PARAM_STR);
$stmt->bindValue(':month', $month, PDO::PARAM_STR);
$stmt->bindValue(':day', $day, PDO::PARAM_STR);
$stmt->execute();

$dhb = null;

$csv = "注文コード, 注文日時, 会員番号, お名前, メール, 郵便番号, 住所, TEL, 商品コード, 商品名, 価格, 数量\n";

while($rec = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $csv .= $rec['code'].',';
    $csv .= $rec['date'].',';
    $csv .= $rec['code_member'].',';
    $csv .= $rec['sales_name'].',';
    $csv .= $rec['email']. ',';
    $csv .= $rec['postal1'].'-'.$rec['postal2'].',';
    $csv .= $rec['address'].',';
    $csv .= $rec['tel'].',';
    $csv .= $rec['code_product'].',';
    $csv .= $rec['product_name'].',';
    $csv .= $rec['price'].',';
    $csv .= $rec['quantity']."\n";
}

$file = fopen('./chumon.csv', 'w');
$csv = mb_convert_encoding($csv, 'SJIS', 'UTF-8');
fputs($file, $csv);
fclose($file);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><a href="chumon.csv">注文データのダウンロード</a></p>
    <p><a href="order_download.php">日付選択へ</a></p>
    <p><a href="../staff_login/staff_top.php">トップメニューへ</a></p>
</body>
</html>









