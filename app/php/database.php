<?php
    $server_name = "sylvester-mccoy-v3.ics.uci.edu";
    $username = "inf124grp04";
    $password = "rePesE*5";

    // Create connection    
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=$username", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
