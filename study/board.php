<?php
require_once 'functions.php';

$err = [];
$data = [];
$dbh = getDb();

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = get_post('name');
    $comment = get_post('comment');

    if(!check_words($name, 50)) {
        $err[] = 'お名前欄を修正してください';
    }

    if(!check_words($comment, 200)) {
        $err[] = 'コメント欄を修正してください';
    }
    if(count($err) === 0) {
        $result = insert_comment($dbh, $name, $comment);
    }
}

$data = select_comments($dbh);

include_once 'view.php'; 