<?php
include 'config.php';
var_dump($_POST);

$sql = "INSERT INTO list
        (빌려간사람, 빌린시각, 언제까지, 노트북번호)
        VALUES (?,?,?,?)";
$prepared = $db->prepare($sql);

if( ! $prepared->execute(array(
    $_POST['빌려간사람'],
    $_POST['빌린시각'],
    $_POST['언제까지'],
    $_POST['노트북번호'],
))){
    var_dump($db->errorInfo());
    exit;
}
header('location: ' . $_SERVER['HTTP_REFERER']);