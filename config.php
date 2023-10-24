<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ishtari_task";

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
    echo "Database Connection Failed " . $e->getMessage();
    exit;
}