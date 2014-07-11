<?php
include 'config.php';
$id = (int) $_GET['id'];
$prepared = $db->prepare("DELETE FROM list WHERE id = ?");
if( ! $prepared->execute(array($id))){
    var_dump($prepared->errorInfo());
    exit;
};
header('location: ' . $_SERVER['HTTP_REFERER']);