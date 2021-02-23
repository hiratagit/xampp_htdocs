<?php

$err = array();
$img = $_FILES['img'];

// var_dump($img);

$type = exif_imagetype($img['tmp_name']);

if($type !== IMAGETYPE_JPEG && $type !== IMAGETYPE_PNG) {
    $err['pic'] = '対象ファイルがJPEGまたはPNGのみです';

}elseif($img['size'] > 102400) {
    $err['pic'] = 'ファイルサイズは100KB以下にしてください';

}else{
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $new_img = md5(uniqid(mt_rand(), true)).'.'.$extension;
    move_uploaded_file($img['tmp_name'], './img/'.$new_img);
}

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
    <?php if(count($err) > 0) {
        foreach($err as $row) {
            print '<p>'.$row.'</p>';
        }
        print '<a href="./pic_send.php">戻る</a>';
    } else { ?>
        <div><img src="http://<?php print $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);?>/img/<?php print $img['name']; ?>" alt=""></div>
    <?php } ?>
</body>
</html>