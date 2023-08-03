<?php
    $host = "containers-us-west-128.railway.app";
    $username = "root";
    $password = "MfAgNNKdgle56W4cHlAB";
    $dbName = "libreria";
    $port = 7423;

    try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbName", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
?>