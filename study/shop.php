<?php

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $product = $_POST['product'];
    $num = $_POST['num'];
    $_SESSION['cart'][$product] = $num;
}

$cart = [];

if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
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
    <h1>商品一覧</h1>
    <a href="cart.php">カートを見る</a>
    <table style="text-align: center">
    <tr>
        <th>商品</th>
        <th>数量</th>
        <th>ボタン</th>
    </tr>

    <form action="" method="POST">
    <tr>
        <td>業務用デスク</td>
        <td>
            <select name="num" id="num">
                <?php for($i = 1; $i < 10; $i++) : ?>
                    <option value="<?php print $i; ?>"><?php print $i; ?></option>
                <?php endfor; ?>
            </select>
        </td>
        <td>
            <input type="hidden" name="product" value="desk_01">
            <?php if(isset($cart['desk_01'])) : ?>
                <p>追加済み</p>
            <?php else: ?>
                <input type="submit" value="カートに入れる">
            <?php endif; ?>
        </td>
    </tr>
    </form>

    <form action="" method="POST">
    <tr>
        <td>快適イス</td>
        <td>
            <select name="num" id="num">
                <?php for($i = 1; $i < 10; $i++) : ?>
                    <option value="<?php print $i; ?>"><?php print $i; ?></option>
                <?php endfor; ?>
            </select>
        </td>
        <td>
            <input type="hidden" name="product" value="chair_07">
            <?php if(isset($cart['chair_07'])) : ?>
                <p>追加済み</p>
            <?php else: ?>
                <input type="submit" value="カートに入れる">
            <?php endif; ?>
        </td>
    </tr>
    </form>
    
    </table>
</body>
</html>