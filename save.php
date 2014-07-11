<?php
include 'config.php';
var_dump($_POST);

$sql = "INSERT INTO list SET
        빌려간사람 = '{$_POST['빌려간사람']}',
        빌린시각 = '{$_POST['빌린시각']}',
        언제까지 = '{$_POST['언제까지']}',
        노트북번호 = '{$_POST['노트북번호']}'";
if( ! $db->query($sql)){
    var_dump($db->errorInfo());
    exit;
}
header('location: ' . $_SERVER['HTTP_REFERER']);