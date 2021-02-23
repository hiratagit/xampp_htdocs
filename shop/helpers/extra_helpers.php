
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

//$_POSTデータのsanitize関数
function sanitize($before) {
	foreach($before as $key => $value) {
		$after[$key] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
	}
	return $after;
}

function check_words(string $word, int $length) : bool {
    return mb_strlen($word) !== 0 && mb_strlen($word) <= $length;
}

function pulldown_year(int $start = 2018, int $end = 2021) : void {
	print '<select name="year" id="year">';
    for($i = $start; $i <= $end; $i++) {
		print '<option value="'.$i.'">'.$i;
	}
	print '</select>';
}
function pulldown_month(bool $zero = true) : void {
	print '<select name="month" id="month">';
    for($i = 1; $i <= 12; $i++) {
		if($zero === true && $i < 10) {
			print '<option value="0'.$i.'">0'.$i;
		} else {
			print '<option value="'.$i.'">'.$i;
		}
	}
	print '</select>';
}

function pulldown_day(bool $zero = true) : void {
	print '<select name="day" id="day">';
    for($i = 1; $i <= 31; $i++) {
		if($zero === true && $i < 10) {
			print '<option value="0'.$i.'">0'.$i;
		} else {
			print '<option value="'.$i.'">'.$i;
		}
	}
	print '</select>';
}