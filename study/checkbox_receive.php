<?php
    if($_SERVER['REQUEST_METHOD'] !== 'POST') {
        die('不正な操作です');
    }

    $colors = [];
    if(isset($_POST['colors'])){
        $colors = $_POST['colors'];
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
<ul>
    <?php foreach($colors as $color) {?>
    <li><?= htmlspecialchars($color, ENT_QUOTES, 'UTF-8')?></li>    
    <?php } ?>

    <p>あなたの好きな色は<?= implode('と', $colors);?></p>
</ul> 
    
</body>
</html>