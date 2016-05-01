<?php
    $server_name = "";
    $username = "";
    $password = "";

    // Create connection    
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$username", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
