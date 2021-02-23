<?php

if($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $inquery = $_POST['inquery'];

    $pattern = '/\A([a-z0-9_\-\+\/\?]+)';
    $pattern .='@([a-z0-9\-]+\.)+[a-z]{2,6}\z/i';

    if(!preg_match($pattern, $email)) {
        $err = 'メールアドレスの形式が違います。';
    }

    if(!isset($err)) {
        mb_language("Japanese");
        mb_internal_encoding("UTF-8");
        $subject = 'お問い合わせありがとうございます';
        $inquery =<<<EOM

        {$name}さん、

        お問い合わせ内容：
        {$inquery}
EOM;

        $headers = 'From: dzdq8232@yahoo.co.jp'."\r\n";

        if(mb_send_mail($email, $subject, $inquery, $headers)) {
            $message = 'お問い合わせを受け付けました。確認メールを送信しております。';
        } else {
            $message = 'メール送信に失敗しました。';
        }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        p.red-text{
            color: red;
        }
    </style>
</head>
<body>
    <h1>お問い合わせ</h1>
    <?php if(isset($message)) {print '<p class="red-text">'.$message.'</p>';} ?>
    <form action="" method="POST">
    <label for="neme">お名前</label>
    <p><input type="text" id="name" name="name"></p>
    <label for="email">メールアドレス</label>
    <?php if(isset($err)){print '<p class="red-text">'.$err.'</p>';} ?>
    <p><input type="text" id="email" name="email"></p>
    <label for="inquery"></label>
    <p><textarea name="inquery" id="inquery" cols="30" rows="10"></textarea></p>
    <input type="submit" value="送信">
    </form>
    
</body>
</html>