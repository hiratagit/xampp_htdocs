<?php

$str = 'フライパン';

$target = mb_strtolower($str, 'UTF-8');
$target = mb_convert_kana($target, 'KVas', 'UTF-8');
$target = preg_replace('/\s|、|。/', '', $target);


$flg = 0;

$ok_words = array('フライパン', 'コーヒーゼリー');

foreach($ok_words as $ok_word) {
    if(mb_strpos($target, $ok_word) !== FALSE) {
        $target = str_replace($ok_word, '*', $target);
    }

}

$ng_words = array('パン', 'コーヒー');

foreach($ng_words as $ng_word) {
    if(mb_strpos($target, $ng_word) !== FALSE) {
        $flg = 1;
        break;
    }

}


if($flg > 0) {
    print '禁止ワードが含まれています。';
} else {
    print '問題のない文字列です。';
}

print "{$str}->{$target}";