<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <p>プロパティーを登録しよう</p>
    <form action="post_receive.php" method="POST">
    <p>名前: <input type="text" name="name"></p>
    <p>性別: <input type="radio" name="sex" value="1">男
            <input type="radio" name="sex" value="2">女
    </p>
    <p>血液型: <select name="blood">
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="O">O</option>
        <option value="AB">AB</option>
    </select>
    </p>
    <p>
    <textarea name="comment" cols="40" rows="4"></textarea>
    </p>
    
    <input type="submit" value="送信">
    </form>
    
</body>
</html>