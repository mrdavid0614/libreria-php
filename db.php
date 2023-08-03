<?php
    $host = "containers-us-west-101.railway.app";
    $username = "root";
    $password = "06fifRdhcQ8Yw0wDbrAs";
    $dbName = "libreria";
    $port = 6949;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbName;charset=UTF8;", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
?>