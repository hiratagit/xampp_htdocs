<?php

if(isset($_POST['edit'])) {
    if(!isset($_POST['procode'])) {
        header('Location:pro_ng.php');
        exit();
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_edit.php?procode='.$pro_code);
    exit();
}
if(isset($_POST['delete'])) {
    if(!isset($_POST['procode'])) {
        header('Location:pro_ng.php');
        exit();
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_delete.php?procode='.$pro_code);
    exit();
}

if(isset($_POST['add'])) {
    header('Location:pro_add.php');
    exit();
}

if(isset($_POST['disp'])) {
    if(!isset($_POST['procode'])) {
        header('Location:pro_ng.php');
        exit();
    }
    $pro_code = $_POST['procode'];
    header('Location:pro_disp.php?procode='.$pro_code);
    exit();
}