<?php 

//エスケープ
function e(string $str, string $charset = 'UTF-8'):string {
	return htmlspecialchars($str, ENT_QUOTES | ENT_HTML5, $charset);
}

//postデータの取得と検証
function get_post(string $key) : string {
	if(isset($_POST[$key])) {
			$var = trim($_POST[$key]);
			return $var;
	}
}

function check_words(string $word, int $length) : bool {
    return mb_strlen($word) !== 0 && mb_strlen($word) <= $length;
}

function getDb() {

    try {
        $dsn = 'mysql:dbname=sample; host=localhost; charset=utf8';
        $user = 'root';
        $password = '';
        $db = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
            print $e->getMessage();
            die();
    }
  
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  
}

function insert_comment($dbh, $name, $comment) {
   
    date_default_timezone_set('Asia/Tokyo');
    $date = date('Y-m-d H:i:s');
    $sql = "insert into board (name, comment, created) values (:name, :comment, '{$date}')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

    if(!$stmt->execute()) {
        return 'データの書き込みに失敗しました';
    }
}

function select_comments($dbh) {
    $data = [];

    $sql = "select name, comment, created from board";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }

    return $data; 
}