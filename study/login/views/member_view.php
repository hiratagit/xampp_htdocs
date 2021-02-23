<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>こんにちは<?php print e($member['name']); ?>さん</p>
    <p>email: <?php print e($member['email']); ?></p>
    <p><a href="logout.php">ログアウト</a></p>
    <h1>会員専用ページ</h1>
    <hr width="300px" align="left">
    <p style="font-size:small">こちらはログイン後の画面です</p>
    <h2>会員一覧</h2>
    <ul>
    <?php foreach($members as $member) : ?>
     <li><?php print e($member['name']); ?></li>
    <?php endforeach; ?>
    </ul>


</body>
</html>