<?php

function get_Db_connect() {

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

  function email_exists($dbh, $email) {
    $sql ="select count(id) from members where email = :email";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $count = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count['count(id)'] > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }

  function select_member($dbh, $email, $password) {

    $sql = "select * from members where email = :email limit 1";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if($stmt->rowCount() > 0) {
      $data = $stmt->fetch(PDO::FETCH_ASSOC);
      if(password_verify($password, $data['password'])) {
        return $data;
      } else {
        return false;
      }
      return false;
    }
  }

  function select_members($dbh) {

    $sql = "select * from members";
    $stmt = $dbh->prepare($sql);
    $stmt->execute();
    $data = [];

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       $data[] = $row;
    }
    return $data;
  }

  function insert_member_data($dbh, $name, $email, $password) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $date = date('Y-m-d H:i:s');
    $sql = "insert into members (name, email, password, created) value (:name, :email, :password, '{$date}')";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    if($stmt->execute()) {
      return TRUE;
    } else {
      return FALSE;
    }
  }