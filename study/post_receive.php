<?php
// var_dump($_POST);

$name = $_POST['name'];
$sex = $_POST['sex'];
 if($sex === '1') {
     $sex = '男性';
 }else {
     $sex = '女性';
 }
$blood = $_POST['blood'];
$comment = $_POST['comment'];

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>受信ページ</h1>
    <p>あなたの名前は<?=$name ?>さんです</p>
    <p>あなたの性別は<?=$sex ?>です</p>
    <p>あなたの血液型は<?=$blood ?>型です</p>
    <p>
        <?php print nl2br($comment); ?>
    </p>

    
</body>
</html>