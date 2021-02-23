<?php
require_once '../helpers/extra_helpers.php';
session_start();
session_regenerate_id(true);
if(!isset($_SESSION['login'])) {
    print 'ログインされていません<br/>';
    print '<a href="../staff_login/staff_login.php">ログイン画面へ</a>';
    exit();
}

$staff_code = e($_POST['code']);
$staff_name = e($_POST['name']);
$staff_pass = e($_POST['pass']);
$staff_pass2 = e($_POST['pass2']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

if($staff_name === '') {
    print 'スタッフ名が入力されていません<br>';
} else {
    print 'スタッフ名:';
    print $staff_name;
    print '<br>';
}

if($staff_pass === '') {
    print 'パスワードが入力されていません<br>';
}

if($staff_pass !== $staff_pass2) {
    print 'パスワードが一致しません<br>';
}

if($staff_name === ''||$staff_pass === ''||$staff_pass !== $staff_pass2) {
    print '<form>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '</form>';
} else {

    $staff_pass = md5($staff_pass);
    print '<form method="post" action="staff_edit_done.php">';
    print '<input type="hidden" name="code" value="'.$staff_code.'">';
    print '<input type="hidden" name="name" value="'.$staff_name.'">';
    print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
    print '<br>';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
}
?>
    
</body>
</html>




