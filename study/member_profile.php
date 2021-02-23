<?php

$id = '';

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
}

$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = <<<SQL
    select user.name, 
           user.age,
           club.club_name,
           club.count,
           club.overview
    from user
    join club on user.club_id = club.club_id
    where user.id = :id
    limit 1
SQL;
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($row);

} catch (PDOException $e) {
    print $e->getMessage();
    die();
} finally {
    $dbh = null;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .search{float: right;}
    </style>
</head>
<body>
    <div class="search">
        <p>会員idを入力してください</p>
        <form action="" method="GET">
        <input type="text" name="id">
        <input type="submit" value="確認する">
        </form>
    </div>
    <h1>会員データ</h1>
    <?php if(!isset($_GET['id'])) : ?>
        <p>会員番号を入力してください</p>
    <?php elseif($row === false) : ?>
        <p>存在しない会員IDです。</p>
    <?php else:?>
    <table border=1>
        <tr>
            <th>お名前</th>
            <th>年齢</th>
            <th>クラブ</th>
            <th>月の活動回数</th>
            <th>概要</th>
        </tr>
        <tr>
            <td><?php print $row['name']; ?></td>
            <td><?php print $row['age']; ?></td>
            <td><?php print $row['club_name']; ?></td>
            <td><?php print $row['count']; ?>回</td>
            <td><?php print $row['overview']; ?></td>
        </tr>
    </table>
    <?php endif; ?>
</body>
</html>