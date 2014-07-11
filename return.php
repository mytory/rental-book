<?php
include 'config.php';
$반납시각 = date('Y-m-d H:i:s');
$id = (int) $_GET['id'];
$prepared = $db->prepare("UPDATE list SET `반납시각` = ? WHERE id = ?");
if( ! $prepared->execute(array($반납시각, $id))){
    var_dump($prepared->errorInfo());
    exit;
};
header('location: ' . $_SERVER['HTTP_REFERER']);