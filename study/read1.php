<?php

$file = @fopen('access.log', 'r') or die('ファイルを開けませんでした。');
$count = 0;
flock($file, LOCK_SH);
while(!feof($file)) {
    $line = fgets($file);
    print '<p>'.$line.'</p>';
    $count ++;
}

flock($file, LOCK_UN);
fclose($file);

print ($count - 1).'回の訪問がありました。';