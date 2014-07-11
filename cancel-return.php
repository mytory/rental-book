<?php
include 'config.php';
$id = (int) $_GET['id'];
$prepared = $db->prepare("UPDATE list SET `반납시각` = ? WHERE id = ?");
if( ! $prepared->execute(array(null, $id))){
    var_dump($prepared->errorInfo());
    exit;
};
header('location: ' . $_SERVER['HTTP_REFERER']);