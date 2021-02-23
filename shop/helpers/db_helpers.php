<?php
function get_Db() {

    try {
        $dsn = DSN;
        $user = DB_USER;
        $password = DB_PASSWORD;
        $dbh = new PDO($dsn, $user, $password);
    } catch (PDOException $e) {
            print $e->getMessage();
            die();
    }
  
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
  
  }
