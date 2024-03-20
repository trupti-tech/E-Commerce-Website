<?php

    // $servername = "sql209.infinityfree.com";
    // $username = "if0_36201445";
    // $password = "6igy4lKQ7jWJ";
    
    $servername = "localhost";
    $username = "root";
    $password = "";

    try{
        $conn = new PDO("mysql:host=$servername;port=1111;dbname=case_study", $username, $password); 
        // $conn = new PDO("mysql:host=$servername;dbname=if0_36201445_case_study", $username, $password); 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        die();
    }

?>