<?php
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['login'])) {
    print 'ログインされていません<br/>';
    print '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit();
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
    <h2>スタッフ追加</h2>
    <form action="staff_add_check.php" method="post">
    
    <p>スタッフ名を入力してください</p>
    <p><input type="text" name="name" style="width: 200px;"></p>
    <p>パスワードを入力してください</p>
    <p><input type="password" name="pass" style="width: 100px;"></p>
    <p>パスワードをもう一度入力してください</p>
    <p><input type="password" name="pass2" style="width: 100px;"></p>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
    </form>
</body>
</html>