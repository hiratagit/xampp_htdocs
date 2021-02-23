<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ログイン画面</h1>
    <form action="" method="post">
    <p>メールアドレス：<input type="text" name="email"><?php if(isset($errs['email'])) {print e($errs['email']);} ?></p>
    <p>パスワード：<input type="password" name="password"><?php if(isset($errs['password'])){print e($errs['password']);} ?></p>
    <input type="submit" value="ログイン">
    <p><a href="signup.php">新規登録</a></p>
    </form>
</body>
</html>