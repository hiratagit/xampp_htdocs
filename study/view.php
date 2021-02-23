<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ひとこと掲示板</h1>
    <table border=1>
        <tr style="background-color: orange;">
            <th>名前</th>
            <th>コメント</th>
            <th>時刻</th>
        </tr>
        <?php if(count($data)): foreach($data as $row) : ?>
            <tr>
                <td><?php print e($row['name']); ?></td>
                <td><?php print nl2br(e($row['comment'])); ?></td>
                <td><?php print e($row['created']); ?></td>
            </tr>
        <?php endforeach; endif; ?>

        <?php if(isset($err)) { 
            foreach($err as $er) { ?>
                <p style="color: red"><?php print $er; ?></p>
            <?php }
        } ?>
    </table>

    <form action="" method="POST">
        <p>お名前*<input type="text" name="name">(50文字まで)</p>
        <p>ひとこと<textarea name="comment" cols="40" rows="4"></textarea>(200文字まで)</p>
        <input type="submit" value="投稿">
    </form>   
</body>
</html>