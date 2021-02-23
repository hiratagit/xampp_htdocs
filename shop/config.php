<?php

define('DSN', 'mysql:dbname=shop;host=localhost;charset=utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('SITE_URL', 'http://localhost/shop/');

error_reporting(E_ALL & ~E_NOTICE); // 公開時：error_reporting(0)
session_set_cookie_params(1440, '/');