<?php
session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'];
    $kind = $_POST['kind'];

    if($kind === 'change') {
        $num = $_POST['num'];
        $_SESSION['cart'][$product] = $num;
    } elseif($kind === 'delete') {
        unset($_SESSION['cart'][$product]);
    }

}

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
    <h1>ショッピングカート</h1>
    <p><a href="shop.php">商品一覧へ</a></p>
    <p><a href="delete.php">カートを空に</a></p>

    <table style="text-align: center">
    
    <tr>
        <th>商品</th>
        <th>個数</th>
        <th>数量</th>
        <th>変更ボタン</th>
        <th>削除ボタン</th>
    </tr>

    <?php if(isset($cart)) : foreach($cart as $key => $var) : ?>
    <tr>
        <td>
            <?php
                switch($key) {
                    case 'desk_01':
                    print '業務用デスク';
                    break;
                    case 'chair_07':
                    print '快適イス';
                    break;
                }
            ?>
        </td>
        <td><?php print $var; ?>個</td>
        <form action="" method="post">
        <td>
            <select name="num" id="num">
               <?php for($i = 1; $i < 10; $i++) : ?>
                <option value="<?php print $i; ?>"><?php print $i; ?></option>
               <?php endfor; ?>
            </select>
        </td>
        <td>
            <input type="hidden" name="kind" value="change">
            <input type="hidden" name="product" value="<?php print $key ?>">
            <input type="submit" value="変更">
        </td>
        </form>
        <form action="" method="post">
        <td>
            <input type="hidden" name="kind" value="delete">
            <input type="hidden" name="product" value="<?php print $key; ?>">
            <input type="submit" value="削除">
        </form>
        </td>
    </tr>
    <?php endforeach; endif;?>
    </table>
</body>
</html>