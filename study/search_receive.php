<?php
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        die('不正なアクセスです');
    }

    $errMsg = null;
    
    $name = $_POST['name'];

    if($name === ''){
        die('入力が空です');
    }

    $dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';

    try {
        $dbh = new PDO($dsn, $user, $password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from user where name like :name";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':name', '%'.$name.'%', PDO::PARAM_STR);
        $stmt->execute();
        $count = $stmt->rowCount();
        $data = [];
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
    } catch (PDOException $e) {
        print $e->getMessage();
        die();
    } finally {
        $dbh = null;
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
    <table border=1>
        <tr><th>id</th><th>名前</th></tr>
        <?php foreach($data as $row) :?>
        <tr><td><?=$row['id'] ?></td><td><?=$row['name'] ?></td></tr>
        <?php endforeach; ?>
    </table>
    
</body>
</html>