<?php

mb_language("Japanese");
mb_internal_encoding("UTF-8");

$user_name = 'taro';
$to = 'nobukazu-hirata@handclap.info';
$subject = 'XAMPPよりテスト送信2';

$message = <<<EOM
{$user_name}さん、

苦労しましたがやっと接続できました。
このメールはテスト送信です。
http://{$_SERVER['SERVER_NAME']}
EOM;

$from = "HANDCLAP 事務局";
$from_mail = "dzdq8232@yahoo.co.jp";

$headers = '';
$headers .= "Cc: info@handclap.info \r\n";
$headers .= "Content-Type: text/plain \r\n";
$headers .= "Return-Path: ".$from_mail."\r\n";
$headers .= "From: ".$from_mail."\r\n";
$headers .= "Sender: ".$from."\r\n";
$headers .= "Reply-to: ".$from_mail."\r\n";
$headers .= "Organization: ".$from."\r\n";

$headers = 'From: dzdq8232@yahoo.co.jp'."\r\n";

if(mb_send_mail($to, $subject, $message, $headers)) {
    print 'メールを送信しました';
}else {
    print 'メール送信に失敗しました';
}
