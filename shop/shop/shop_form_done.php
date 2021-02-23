<?php
require_once '../config.php';
require_once '../helpers/db_helpers.php';
require_once '../helpers/extra_helpers.php';

session_start();
session_regenerate_id(true);

$post = sanitize($_POST);

$onamae = $post['onamae'];
$email = $post['email'];
$postal1 = $post['postal1'];
$postal2 = $post['postal2'];
$address = $post['address'];
$tel = $post['tel'];
$chumon = $post['chumon'];
$pass = $post['pass'];
$danjo = $post['danjo'];
$birth = $post['birth'];

try {

    $honbun = '';
    $honbun .= $onamae."様\n\nこの度はご注文ありがとうございました。\n";
    $honbun .= "\n";
    $honbun .= "ご注文商品\n";
    $honbun .= "--------------------------\n";

    $cart = $_SESSION['cart'];
    $kazu = $_SESSION['kazu'];
    $kakaku = [];
    $max = count($cart);

    $dbh = get_Db();
    $gokei = 0;

    for($i = 0; $i < $max; $i++) {

        $sql = "select name, price from mst_product where code = :code";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':code', $cart[$i], PDO::PARAM_INT);
        $stmt->execute();

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = $rec['name'];
        $price = $rec['price'];
        $kakaku[] = $price;
        $suryo = $kazu[$i];
        $syokei = $price * $suryo; 
        $gokei += $syokei;

        $honbun .= $name. ' ';
        $honbun .= $price. '円 ×';
        $honbun .= $suryo.'個 = ';
        $honbun .= $syokei."円\n";
    }

    $sql = "LOCK TABLES dat_sales WRITE, dat_sales_product WRITE, dat_member WRITE";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();


    $lastmembercode = 0;

    if($chumon === 'chumontouroku') {

        $sql = 'insert into dat_member (password, name, email, postal1, postal2, address, tel, danjo, born)
        values (:pass, :name, :email, :postal1, :postal2, :address, :tel, :danjo, :born)';

        // if($danjo === 'dan') {
        //     $danjoParam = 1;
        // }else {
        //     $danjoParam = 2;
        // }
    
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':pass', md5($pass), PDO::PARAM_STR);
        $stmt->bindValue(':name', $onamae, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':postal1', $postal1, PDO::PARAM_STR);
        $stmt->bindValue(':postal2', $postal2, PDO::PARAM_STR);
        $stmt->bindValue(':address', $address, PDO::PARAM_STR);
        $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
        $stmt->bindValue(':danjo', $danjo === 'dan' ? 1 : 2, PDO::PARAM_INT);
       // $stmt->bindValue(':danjo', $danjoParam, PDO::PARAM_INT);
        $stmt->bindValue(':born', $tel, PDO::PARAM_INT);
        $stmt->execute();
    
        $lastmembercode = $dbh->lastInsertId();

    }

    $sql = 'insert into dat_sales (code_member, name, email, postal1, postal2, address, tel)
    values (:code_member, :name, :email, :postal1, :postal2, :address, :tel)';

    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':code_member', $lastmembercode, PDO::PARAM_INT);
    $stmt->bindValue(':name', $onamae, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':postal1', $postal1, PDO::PARAM_STR);
    $stmt->bindValue(':postal2', $postal2, PDO::PARAM_STR);
    $stmt->bindValue(':address', $address, PDO::PARAM_STR);
    $stmt->bindValue(':tel', $tel, PDO::PARAM_STR);
    $stmt->execute();

    $lastcode = $dbh->lastInsertId();

    // $sql = "select LAST_INSERT_ID()";
    // $stmt = $dbh->prepare($sql);
    // $stmt->execute();
    // $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    // $lastcode = $rec['LAST_INSERT_ID()'];

    for($i = 0; $i < $max; $i++) {
        $sql = "insert into dat_sales_product(code_sales, code_product, price, quantity)
        values(:code_sales, :code_product, :price, :quantity)";

        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':code_sales', $lastcode, PDO::PARAM_INT);
        $stmt->bindValue(':code_product', $cart[$i], PDO::PARAM_INT);
        $stmt->bindValue(':price', $kakaku[$i], PDO::PARAM_INT);
        $stmt->bindValue(':quantity', $kazu[$i], PDO::PARAM_INT);
        $stmt->execute();
    }

    $sql = "UNLOCK TABLES";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;


    $honbun .= "[ 合計金額：".$gokei."円 ]\n";
    $honbun .= "送料は無料です。\n";
    $honbun .= "--------------------------\n";
    $honbun .= "\n";
    $honbun .= "代金は以下の口座にお振込みください\n";
    $honbun .= "ろくまる銀行やさい支店　普通口座1234557\n";
    $honbun .= "入金確認が取れ次第、梱包、発送させていただきます。\n";
    $honbun .= "\n";
    $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□□\n";
    $honbun .= "～安心野菜のろくまる農園～\n";
    $honbun .= "\n";
    $honbun .= "〇〇県六丸郡六丸村１２３－４\n";
    $honbun .= "電話：090-3895-8226\n";
    $honbun .= "□□□□□□□□□□□□□□□□□□□□□□□□\n";

    $title = 'ご注文ありがとうございます。';
    $from = "HANDCLAP 事務局";
    $from_mail = "dzdq8232@yahoo.co.jp";

    $headers = '';
    $headers .= "Content-Type: text/plain \r\n";
    $headers .= "Return-Path: ".$from_mail."\r\n";
    $headers .= "From: ".$from_mail."\r\n";
    $headers .= "Sender: ".$from."\r\n";
    $headers .= "Reply-to: ".$from_mail."\r\n";
    $headers .= "Organization: ".$from."\r\n";

    $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');

    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    // if(!mb_send_mail($email, $title, $honbun, $headers)) {
    //     print 'メール送信に失敗しました';
    // };

    $headers = '';
    $headers .= "Content-Type: text/plain \r\n";
    $headers .= "Return-Path: ".$from_mail."\r\n";
    $headers .= "From: ".$email."\r\n";
    $headers .= "Sender: ".$from."\r\n";
    $headers .= "Reply-to: ".$email."\r\n";
    $headers .= "Organization: ".$from."\r\n";

    $title = 'お客様からご注文がありました。';
    $header = 'From: '.$email;
    $honbun = $honbun = html_entity_decode($honbun, ENT_QUOTES, 'UTF-8');
    
    mb_language('Japanese');
    mb_internal_encoding('UTF-8');
    // if(!mb_send_mail($from_mail, $title, $honbun, $headers)) {
    //     print 'メール送信に失敗しました';
    // };


} catch (Exception $e) {
    print $e->getMessage();
    print 'ただいま障害により大変ご迷惑をお掛けしております';
}

$_SESSION = [];
if(isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php print $onamae ; ?>様</p>
    <p>ご注文ありがとうございました。</p>
    <p><?php print $email; ?>にメールを送りましたのでご確認ください。</p>
    <p>商品は以下の住所に発送させていただきます。</p>
    <p><?php print $postal1; ?>-<?php print $postal2; ?><br>
       <?php print $address; ?><br>
       TEL:<?php print $tel; ?>
    </p>
    <p><a href="shop_list.php">商品画面へ</a></p>
</body>
</html>