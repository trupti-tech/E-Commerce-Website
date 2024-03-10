<?php

    $servername = "localhost";
    $username = "root";
    $password = "";

    try{
        $conn = new PDO("mysql:host=$servername;port=1111;dbname=case_study", $username, $password); 
        // Port Number Just for my host machine
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        die();
    }

?>