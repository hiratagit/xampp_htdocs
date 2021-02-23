<?php

$dsn = 'mysql:dbname=sample;host=localhost;charset=utf8';
$user = 'root';
$password = '';

$name = '田中三郎';
$age = 28;
$email = 'sample3@sample.com';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from user";
    $stmt = $dbh->prepare($sql);
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <table border=1>
    <tr><th>id</th><th>名前</th><th>年齢</th><th>mail</th></tr>
    <?php foreach($data as $row) { ?>
        <tr>
            <td><?= $row['id']?></td>
            <td><?= $row['name']?></td>
            <td><?= $row['age']?></td>
            <td><?= $row['email']?></td>
        </tr>
    <?php } ?>
  </table>
    
</body>
</html>

