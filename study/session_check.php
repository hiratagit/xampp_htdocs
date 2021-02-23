<?php 

session_start();

var_dump($_SESSION);

$profile = $_SESSION['profile'];
$cart = $_SESSION['cart'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>セッションの中身</h1>
    <p>こんにちは<?= $profile['user_name']; ?>さん</p>
    <p>地域：<?= $profile['location']; ?></p>

    <h2>カートの中身</h2>
    <table>
    
    <tr>
        <th>商品ID</th>
        <th>個数</th>
    </tr>
    <?php foreach($cart as $key => $var): ?>
        <tr>
            <td><?php print $key; ?></td>
            <td><?php print $var; ?></td>
        </tr>
    <?php endforeach; ?>
    </table>
    <a href="session_set.php">戻る</a>
</body>
</html>