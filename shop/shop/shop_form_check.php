<?php
require_once '../helpers/extra_helpers.php';

$post = sanitize($_POST);

$onamae = $post['onamae'];
$email = $post['email'];
$postal1 = $post['postal1'];
$postal2 = $post['postal2'];
$address = $post['address'];
$tel = $post['tel'];
$chumon = $post['chumon'];
$pass = $post['pass'];
$pass2 = $post['pass2'];
$danjo = $post['danjo'];
$birth = $post['birth'];

$errMsg = [];
$okflg = true;

if($onamae === '') {
    $errMsg[] = 'お名前が入力されていません。';
}

if(preg_match('/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $email) === 0) {
    $errMsg[] = 'メールアドレスを正確に入力してください';
}

if(preg_match('/\A[0-9]+\z/', $postal1) === 0) {
    $errMsg[] = '郵便番号は半角数字で入力してください';
}
if(preg_match('/\A[0-9]+\z/', $postal2) === 0) {
    $errMsg[] = '郵便番号は半角数字で入力してください';
}

if($address === '') {
    $errMsg[] = '住所が入力されていません';
}

if(preg_match('/\A\d{2,5}-?\d{2,5}-?\d{4,5}\z/', $tel) === 0) {
    $errMsg[] = '電話番号を正確に入力してください';
}


if($chumon === 'chumontouroku') {

    if($pass === '') {
        $errMsg[] = 'パスワードが入力されていません。';
    }

    if($pass !== $pass2) {
        $errMsg[] = 'パスワードが一致しません。';
    }
}




if(count($errMsg)) {
    $okflg = false;
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

    <?php 
        foreach($errMsg as $err) {
            print '<p>'.$err.'</P>';
        }
    ?>

    <?php if($okflg) : ?>
    <p>お名前：<?php print $onamae; ?></p>
    <p>メール：<?php print $email; ?></p>
    <p>郵便番号：<?php print $postal1; ?> - <?php print $postal2; ?></p>
    <p>ご住所：<?php print $address; ?></p>
    <p>電話番号：<?php print $tel; ?></p>
    <?php if($chumon === 'chumontouroku') : ?>
        <?php if($danjo === 'dan'): ?>
            <p>性別：<?php print '男性'; ?></p>
        <?php else : ?>
            <p>性別：<?php print '女性'; ?></p>
        <?php endif; ?>
        <p>生まれ年：<?php print $birth; ?>年代</p>
    <?php endif; ?>
    <form method="post" action="shop_form_done.php">
        <input type="hidden" name="onamae" value="<?php print $onamae; ?>">
        <input type="hidden" name="email" value="<?php print $email; ?>">
        <input type="hidden" name="postal1" value="<?php print $postal1; ?>">
        <input type="hidden" name="postal2" value="<?php print $postal2 ?>">
        <input type="hidden" name="address" value="<?php print $address; ?>">
        <input type="hidden" name="tel" value="<?php print $tel; ?>">
        <input type="hidden" name="chumon" value="<?php print $chumon; ?>">
        <input type="hidden" name="pass" value="<?php print $pass; ?>">
        <input type="hidden" name="danjo" value="<?php print $danjo; ?>">
        <input type="hidden" name="birth" value="<?php print $birth; ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK"><br>
    </form>
    <?php else : ?>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>
    <?php endif; ?>
</body>
</html>