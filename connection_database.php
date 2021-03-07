<?php

$host = '127.0.0.1';
$db = 'manageproduct';
$user = 'root';
$pass = '';
$port = '3306';
$charset = 'utf8mb4';
$dsn = 'mysql:host=' . $host . ';' . 'dbname=' . $db . ';' . 'charset=' . $charset . ';' . 'port=' . $port . ';';
try {
    $conn = new PDO($dsn, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    
    


} catch (PDOException $e) {
    
    file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);}
