<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>新規ユーザー登録</h1>
    <form action="signup.php" method="post">
    <p>お名前：<input type="text" name="name"><?php if(isset($errs['name'])) { print $errs['name']; } ?></p>
    <p>メールアドレス：<input type="text" name="email"><?php if(isset($errs['email'])) { print $errs['email'];} ?></p>
    <p>パスワード：<input type="password" name="password"><?php if(isset($errs['password'])) { print $errs['password'];} ?></p>
    <input type="submit" value="登録する">
    </form>
</body>
</html>