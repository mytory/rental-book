<?php
header('content-type: text/html; charset=utf-8');

$dbname = '';
$username = '';
$password = '';

try {
    $db = new PDO('mysql:host=localhost;dbname=' . $dbname . ';charset=utf8', $username, $password);
} catch(PDOException $e) {
    echo $e->getMessage();
    exit;
}
